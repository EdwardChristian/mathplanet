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
    <?php require_once "config.php";

    session_start();

    // verificam daca utilizatorul este deja logat si daca nu il redirectionam catre pagina login
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }

    // definire variabile si initiere cu valori nule
    $termen = $descriere = "";
    $Q_err = $R_err = "";


    // procesare date formular cand este trimis
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // validare camp intrebare
        $input_Q = trim($_POST["T"]);
        if(empty($input_Q)){
            $Q_err = "Va rugam introduceti o intrebare.";
        }else{
            $Q = $input_Q;
        }

        // validare camp raspuns corect
        $input_R = trim($_POST["D"]);
        if(empty($input_R)){
            $R_err = "Va rugam introduceti raspunsul corect.";
        }else{
            $R = $input_R;
        }

        // verifica erori de validare inainte de inseare in db
        if(empty($Q_err) && empty($R_err)){
            // instructiune de inserare
            $sql = "INSERT INTO dictionar (Termen, Descriere) VALUES (?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                // legam variabilele ca si parametri in instructionea de inserare
                mysqli_stmt_bind_param($stmt, "ss", $param_T, $param_D);

                // setare parametri
                $param_T = $_POST["T"];
                $param_D = $_POST["D"];


                // incercare de executie instructiune INSERT
                if(mysqli_stmt_execute($stmt)){
                    // datele au fost introduse cu succes, redirectionare la pagina index
                    header("location: dictionar.php");
                    exit();
                } else{
                    echo "Ceva nu a functionat. Incercati mai tarziu.";
                }
            }

            // inchidere statement
            mysqli_stmt_close($stmt);
        }

        // inchidere conexiune
        mysqli_close($link);
    }



     ?>
      <br><br><br><br>
     <h2>Adauga un termen nou</h2>
     <hr>

 <p>Va rugam sa completati acest formular pentru introducerea unui nou termen in baza de date.</p>
 <br>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


     <div>
         <label>Termen</label>
         <textarea id="unu" rows="1" cols="50" name="T" class="form-control" ><?php echo $termen; ?></textarea>
         <span><?php echo $Q_err;?></span>
     </div>



     <div>
         <label>Descriere</label>
         <textarea rows="8" cols="50" placeholder="Adaugati Descrierea Termenului" name="D"><?php echo $descriere; ?></textarea>
         <span><?php echo $R_err;?></span>
     </div>



     </div>
     <input type="submit" value="Trimite">
     <a href="dictionar.php">Anulare</a>
 </form>

  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
