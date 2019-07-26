<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MathPlanet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_admin.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body>
    <br><br><br><br>
    <?php
    require_once "config.php";

      session_start();
      // verificam daca utilizatorul este deja logat si daca nu il redirectionam catre pagina login
      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
          header("location: login.php");
          exit;
      }

      // declararea variabilelor si initializarea cu valori nule
      $username = $password = $confirm_password = "";
      $username_err = $password_err = $confirm_password_err = "";

      // procesarea datelor din formular cand este trimis
      if($_SERVER["REQUEST_METHOD"] == "POST"){

          // validare formular - verificam daca username a fost introdus si afisam mesaj
          if(empty(trim($_POST["username"]))){
              $username_err = "Va rugam introduceti un nume de utilizator.";
          } else{
              // pregatim o intstructiune SELECT
              $sql = "SELECT ID FROM admin WHERE user = ?";

              if($stmt = mysqli_prepare($link, $sql)){
                  // legam variabilele ca parametri
                  mysqli_stmt_bind_param($stmt, "s", $param_username);

                  // setam parametri
                  $param_username = trim($_POST["username"]);

                  // incercam sa executam instructiunea SELECT pregatita
                  if(mysqli_stmt_execute($stmt)){
                      // stocam rezultatele
                      mysqli_stmt_store_result($stmt);

                      if(mysqli_stmt_num_rows($stmt) == 1){
                          $username_err = "Acest nume de utilizator este deja inregistrat.";
                      } else{
                          $username = trim($_POST["username"]);
                      }
                  } else{
                      echo "Ceva nu a functionat. Va rugam incercati mai tarziu.";
                  }
              }

              // inchidem instructiunea
              mysqli_stmt_close($stmt);
          }

          // validare parola
          if(empty(trim($_POST["password"]))){
              $password_err = "Va rugam introduceti o parola.";
          } elseif(strlen(trim($_POST["password"])) < 6){
              $password_err = "Parola trebuie sa aiba cel putin 6 caractere.";
          } else{
              $password = trim($_POST["password"]);
          }

          // validare parola de confirmare
          if(empty(trim($_POST["confirm_password"]))){
              $confirm_password_err = "Va rugam confirmati parola introdusa.";
          } else{
              $confirm_password = trim($_POST["confirm_password"]);
              if(empty($password_err) && ($password != $confirm_password)){
                  $confirm_password_err = "Parolele introduse nu se potrivesc.";
              }
          }

          // verificam erorile inainte de inserare in baza de date
          if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

              // pregatim o instructiune SELECT
              $sql = "INSERT INTO admin (user, parola) VALUES (?, ?)";

              if($stmt = mysqli_prepare($link, $sql)){
                  // legam variabilele de instructiunea pregatita ca parametri
                  mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                  // setam parametri
                  $param_username = $username;
                  $param_password = password_hash($password, PASSWORD_DEFAULT); // creare parola noua folosind un algoritm hash

                  // incercam sa execumtam instructriunea SELECT
                  if(mysqli_stmt_execute($stmt)){
                      // redirectionare la pagina login
                      header("location: login.php");
                  } else{
                      echo "Ceva nu a functionat. Va rugam incercati mai tarziu.";
                  }
              }

              // inchidere declaratie
              mysqli_stmt_close($stmt);
          }

          // inchidere conexiune
          mysqli_close($link);
      }
      ?>
      <h2>Creeaza cont nou</h2>
      <hr>
      <br>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div>
              <label>Nume utilizator</label>
              <input type="text" name="username" value="<?php echo $username; ?>">
              <span><?php echo $username_err; ?></span>
          </div>
          <div>
              <label>Parola</label>
              <input type="password" name="password" value="<?php echo $password; ?>">
              <span><?php echo $password_err; ?></span>
          </div>
          <div>
              <label>Confirma parola</label>
              <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
              <span><?php echo $confirm_password_err; ?></span>
          </div>
          <br>
          <div class="form-group">
              <input type="submit" value="Trimite">
              <input type="reset" value="Reseteaza">
          </div>
          <p>Ai deja un cont? <a href="login.php">Intra in cont</a>.</p>
      </form>

  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
