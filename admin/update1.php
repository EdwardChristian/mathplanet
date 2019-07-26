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
    $Q_err = $R_err ="";

    // procesare date formular cand este trimis
    if(isset($_POST["ID"]) && !empty($_POST["ID"])){
        // obtine id
        $id = $_POST["ID"];

        // validare camp intrebare
        $input_Q = trim($_POST["Termen"]);
        if(empty($input_Q)){
            $Q_err = "Va rugam introduceti un termen";
        }else{
            $termen = $input_Q;
        }

        // validare camp raspuns corect
        $input_R = trim($_POST["Descriere"]);
        if(empty($input_R)){
            $R_err = "Va rugam introduceti o descriere";
        }else{
            $descriere = $input_R;
        }






        // verifica erori de validare inainte de inseare in db
        if(empty($Q_err) && empty($R_err)){
            // instructiune de UPDATE
            $sql = "UPDATE dictionar SET Termen=?, Descriere=? WHERE ID=?";

            if($stmt = mysqli_prepare($link, $sql)){
                // legam variabilele ca si parametri in instructionea de inserare
                mysqli_stmt_bind_param($stmt, "ssi", $param_T, $param_D, $param_id);

                // setare parametri
                $param_T =  $_POST["Termen"];
                $param_D =  $_POST["Descriere"];
                $param_id = $id;

                // incercare de executie instructiune INSERT
                if(mysqli_stmt_execute($stmt)){
                    // datele au fost introduse cu succes, redirectionare la pagina index
                    header("location: dictionar.php");
                    exit();
                } else{
                    echo "Ceva nu a functionat. Va rugam incercati mai tarziu.";
                }
            }

            // inchidere statement
            mysqli_stmt_close($stmt);
        }

        // inchidere conexiune
        mysqli_close($link);
    } else{
        // verifica existenta parametrului id
        if(isset($_GET["ID"]) && !empty(trim($_GET["ID"]))){
            // obtine parametrul id
            $id =  trim($_GET["ID"]);

            // pregatire instructiune SELECT
            $sql = "SELECT * FROM dictionar WHERE ID = ?";
            if($stmt = mysqli_prepare($link, $sql)){
                // legam variabilele ca si parametri in instructionea de inserare
                mysqli_stmt_bind_param($stmt, "i", $param_id);

                // setare parametri
                $param_id = $id;

                // executie instructie SQL
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);

                    if(mysqli_num_rows($result) == 1){
                        // introducem rezultatele obtinute intr-o matrice
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                        // extragem valoarea fiecarui camp individual
                        $termen = $row["Termen"];
                        $descriere = $row["Descriere"];
                    } else{
                        // URL-ul nu contine id valabil, redirectionare la pagina error
                        header("location: dictionar.php");
                        exit();
                    }

                } else{
                echo "Ceva nu a functionat. Va rugam incercati mai tarziu.";
                }
            }

            // inchidere statement
            mysqli_stmt_close($stmt);

            // inchidere conexiune
            mysqli_close($link);
        }  else{
            // URL-ul nu contine id valabil, redirectionare la pagina error
            header("location: dictionar.php");
            exit();
        }
    }

     ?>
     <br><br><br><br>
     <div class="page-header">
         <h2>Actualizare termen</h2>
     </div>
     <hr><br>
     <p>Va rugam editati campurile pentru actualizarea termenului.</p><br>
     <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
         <div>
             <label>Termen</label>
             <input type="text" name="Termen" value="<?php echo $termen; ?>">
             <span><?php echo $Q_err;?></span>
         </div>


         <div>
             <label>Descriere</label>
             <textarea rows="7" cols="50" name="Descriere"><?php echo $descriere; ?></textarea>
             <span><?php echo $R_err;?></span>
         </div>


         <input type="hidden" name="ID" value="<?php echo $id; ?>"/>
         <input type="submit" value="Trimite">
         <a href="dictionar.php">Anulare</a>
     </form>


  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
