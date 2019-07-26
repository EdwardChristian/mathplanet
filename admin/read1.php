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
    // verificare existenta parametru id inainte de a merge mai departe
    if(isset($_GET["ID"]) && !empty(trim($_GET["ID"]))){

        // pregatire instruciune sql SELECT
        $sql = "SELECT * FROM dictionar WHERE ID = ?";

        if($stmt = mysqli_prepare($link, $sql)){
                // legam variabilele ca si parametri in instructiunea SELECT
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // setare parametri
            $param_id = trim($_GET["ID"]);

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
    					// URL-ul nu contine parametrul id valabil, redirectionare la pagina error
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
    } else{
            // URL-ul nu contine parametrul id valabil, redirectionare la pagina error
        header("location: dictionar.php");
        exit();
    }?>
    <br><br><br><br>
    <div>
        <h1>Afisare Termen</h1>
    </div>
    <br><hr>
    <div>
        <label>Termen</label>
        <p><?php echo $row["Termen"]; ?></p>
    </div><br><br>
    <div style="max-width:67%;">
        <label>Descriere</label>
        <p><?php echo $row["Descriere"]; ?></p>
    </div><br>

    <p><a href="dictionar.php">Inapoi</a></p>







  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
