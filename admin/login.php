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
    <br><br><br><br><br>
    <?php require_once "config.php";

      session_start();
      // verificam daca utilizatorul este deja logat si daca da il redirectionam in pagina index
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: index.php");
        exit;
      }
      // declararea variabilelor si initializarea cu valori nule
      $username = $password = "";
      $username_err = $password_err = "";

      // procesarea datelor din formular cand este trimis
      if($_SERVER["REQUEST_METHOD"] == "POST"){

          // validare formular - verificam daca username a fost introdus si afisam mesaj
          if(empty(trim($_POST["username"]))){
              $username_err = "Va rugam introduceti un nume de utilizator.";
          } else{
              $username = trim($_POST["username"]);
          }

          // validare formular - verificam daca parola a fost introdusa si afisam mesaj
          if(empty(trim($_POST["password"]))){
              $password_err = "Va rugam sa introduceti o parola.";
          } else{
              $password = trim($_POST["password"]);
          }

          // validam datele de logare
          if(empty($username_err) && empty($password_err)){
              // pregatim o intstructiune SELECT pentru a alege datele din baza de date
              $sql = "SELECT ID, user, parola FROM admin WHERE user = ?";

              if($stmt = mysqli_prepare($link, $sql)){
                  // legam variabilele de instructiunea pregatita ca parametri
                  mysqli_stmt_bind_param($stmt, "s", $param_username);

                  // setam parametri
                  $param_username = $username;

                  // incercam sa executam declaratia pregatita
                  if(mysqli_stmt_execute($stmt)){
                      // stocam rezultatele
                      mysqli_stmt_store_result($stmt);

                      // verificam daca exista username, daca da verificam parola
                      if(mysqli_stmt_num_rows($stmt) == 1){
                          // legam variabilele rezultate
                          mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                          if(mysqli_stmt_fetch($stmt)){
                              if(password_verify($password, $hashed_password)){
                                  // parola este corecta si pornim o noua sesiune
                                  session_start();

                                  // stocare date in variabile glogale de sesiune
                                  $_SESSION["loggedin"] = true;
                                  $_SESSION["id"] = $id;
                                  $_SESSION["username"] = $username;

                                  // Redirectionare user catre pagina index
                                  header("location: index.php");
                              } else{
                                  // Afisare mesaj daca parola este gresita
                                  $password_err = "Parola introdusa nu este valida.";
                              }
                          }
                      } else{
                          // Afisare mesaj daca username-ul nu exista
                          $username_err = "Nu exista un cont cu acest nume de utilizator.";
                      }
                  } else{
                      echo "Ceva nu a functionat. Va rugam incercati mai tarziu.";
                  }
              }

              // Inchidere declaratie
              mysqli_stmt_close($stmt);
          }

          // Inchidere conexiune
          mysqli_close($link);
      }




     ?>
     <h2>Logare</h2>
     <hr>
     <br>
     <p>Va rugam sa introduceti un nume de utilizator si parola</p>
     <br>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
         <div>
             <label>Nume utilizator</label>
             <input type="text" name="username" value="<?php echo $username; ?>">
             <span><?php echo $username_err; ?></span>
         </div>
         <div>
             <label>Parola</label>
             <input type="password" name="password">
             <span><?php echo $password_err; ?></span>
         </div>
         <br>
         <div>
             <input type="submit" value="Login">
         </div>
     </form>
  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
