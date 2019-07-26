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
    if(isset($_POST["ID"]) && !empty($_POST["ID"])){



        // pregatire instructiune de stergere
        $sql = "DELETE FROM dictionar WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
                // legam variabilele ca si parametri
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // setare parametri
            $param_id = trim($_POST["ID"]);

            // incercare de executare instructiune sql
            if(mysqli_stmt_execute($stmt)){
                // inregistrarile au fost sterse cu succes
                header("location: dictionar.php");
                exit();
            } else{
                echo "Ceva nu a functionat. Va rugam incercati mai tarziu";
            }
        }
        // inchidere instructiune
        mysqli_stmt_close($stmt);

        // inchidere conexiune
        mysqli_close($link);
    } else{
        // verificare existenta paramentrului id
        if(empty(trim($_GET["ID"]))){
            // URL-ul nu contine parametrul id valabil, redirectionare la pagina error
            header("location: dictionar.php");
            exit();
        }
    }



     ?>
     <br><br><br><br>
     <div class="page-header">
         <h1>Sterge Termen</h1>
     </div>
     <hr><br>
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
         <div class="">
             <input type="hidden" name="ID" value="<?php echo trim($_GET["ID"]); ?>"/>
             <p>Esti sigur(a) ca vrei sa stergi acest termen?</p><br>
             <p>
                 <input type="submit" value="Da">
                 <a href="dictionar.php" >Nu</a>
             </p>
         </div>
     </form>

  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
