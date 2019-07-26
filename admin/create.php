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
    $intrebare = $raspuns = $V1 = $V2 = $V3 = $V4 = "";
    $Q_err = $R_err = "";


    // procesare date formular cand este trimis
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // validare camp intrebare
        $input_Q = trim($_POST["Intrebare"]);
        if(empty($input_Q)){
            $Q_err = "Va rugam introduceti o intrebare.";
        }else{
            $Q = $input_Q;
        }

        // validare camp raspuns corect
        $input_R = trim($_POST["Raspuns-corect"]);
        if(empty($input_R)){
            $R_err = "Va rugam introduceti raspunsul corect.";
        }else{
            $R = $input_R;
        }

        // verifica erori de validare inainte de inseare in db
        if(empty($Q_err) && empty($R_err)){
            // instructiune de inserare
            $sql = "INSERT INTO intrebari (intrebare, raspuns, V1, V2, V3, V4) VALUES (?, ?, ?, ?, ?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                // legam variabilele ca si parametri in instructionea de inserare
                mysqli_stmt_bind_param($stmt, "ssssss", $param_Q, $param_R, $param_V1, $param_V2, $param_V3, $param_V4);

                // setare parametri
                $param_Q = $Q;
                $param_R = $R;
                $param_V1 = $_POST["V1"];
                $param_V2 = $_POST["V2"];
                $param_V3 = $_POST["V3"];
                $param_V4 = $_POST["V4"];


                // incercare de executie instructiune INSERT
                if(mysqli_stmt_execute($stmt)){
                    // datele au fost introduse cu succes, redirectionare la pagina index
                    header("location: index.php");
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

     <h2>Adauga o intrebare noua</h2>
     <hr>
 <p>Va rugam sa completati acest formular pentru introducerea unei noi intrebari in baza de date.</p>
 <br>
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


     <div>
         <label>Intrebare</label>
         <textarea id="unu" rows="5" cols="50" name="Intrebare" class="form-control" ><?php echo $intrebare; ?></textarea>
         <span><?php echo $Q_err;?></span>
     </div>



     <div>
         <label>Raspuns corect</label>
         <input type="text" placeholder="Adaugati raspunsul corect" name="Raspuns-corect" value="<?php echo $raspuns; ?>">
         <span><?php echo $R_err;?></span>
     </div>
     <div>
         <label>Varianta 1</label>
         <input type="text" name="V1" value="<?php echo $V1; ?>">
     </div>
     <div>
         <label>Varianta 2</label>
         <input type="text" name="V2" value="<?php echo $V2; ?>">
     </div>
     <div>
         <label>Varianta 3</label>
         <input type="text" name="V3" value="<?php echo $V3; ?>">
     </div>
     <div>
         <label>Varianta 4</label>
         <input type="text" name="V4" value="<?php echo $V4; ?>">
     </div>



     </div>
     <input type="submit" value="Trimite">
     <a href="index.php">Anulare</a>
 </form>

  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
