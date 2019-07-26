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
    $Q_err = $R_err ="";

    // procesare date formular cand este trimis
    if(isset($_POST["ID"]) && !empty($_POST["ID"])){
        // obtine id
        $id = $_POST["ID"];

        // validare camp intrebare
        $input_Q = trim($_POST["intrebare"]);
        if(empty($input_Q)){
            $Q_err = "Va rugam introduceti o intrebare.";
        }else{
            $intrebare = $input_Q;
        }

        // validare camp raspuns corect
        $input_R = trim($_POST["raspuns"]);
        if(empty($input_R)){
            $R_err = "Va rugam introduceti raspunsul corect.";
        }else{
            $raspuns = $input_R;
        }





        // verifica erori de validare inainte de inseare in db
        if(empty($Q_err) && empty($R_err)){
            // instructiune de UPDATE
            $sql = "UPDATE intrebari SET intrebare=?, raspuns=?, V1=?, V2=?, V3=?, V4=? WHERE ID=?";

            if($stmt = mysqli_prepare($link, $sql)){
                // legam variabilele ca si parametri in instructionea de inserare
                mysqli_stmt_bind_param($stmt, "ssssssi", $param_Q, $param_R, $param_V1, $param_V2, $param_V3, $param_V4, $param_id);

                // setare parametri
                $param_Q = $intrebare;
                $param_R = $raspuns;
                $param_V1 = $_POST["V1"];
                $param_V2 = $_POST["V2"];
                $param_V3 = $_POST["V3"];
                $param_V4 = $_POST["V4"];
                $param_id = $id;

                // incercare de executie instructiune INSERT
                if(mysqli_stmt_execute($stmt)){
                    // datele au fost introduse cu succes, redirectionare la pagina index
                    header("location: index.php");
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
            $sql = "SELECT * FROM intrebari WHERE ID = ?";
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
                        $intrebare = $row["intrebare"];
                        $raspuns = $row["raspuns"];
                        $V1 = $row["V1"];
                        $V2 = $row["V2"];
                        $V3 = $row["V3"];
                        $V4 = $row["V4"];
                    } else{
                        // URL-ul nu contine id valabil, redirectionare la pagina error
                        header("location: index.php");
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
            header("location: index.php");
            exit();
        }
    }

     ?>
     <br><br><br><br>
     <div class="page-header">
         <h2>Actualizare intrebari</h2>
     </div>
     <hr><br>
     <p>Va rugam editati campurile pentru actualizare intrebarii.</p><br>
     <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
         <div>
             <label>Intrebare</label>
             <textarea rows="4" cols="50" name="intrebare"><?php echo $intrebare; ?></textarea>
             <span><?php echo $Q_err;?></span>
         </div>


         <div>
             <label>Raspuns corect</label>
             <input type="text" name="raspuns" value="<?php echo $raspuns; ?>">
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

         <input type="hidden" name="ID" value="<?php echo $id; ?>"/>
         <input type="submit" value="Trimite">
         <a href="index.php">Anulare</a>
     </form>


  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
