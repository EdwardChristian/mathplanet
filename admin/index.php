<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MathPlanet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_admin.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body><h1 style="padding:15px;">Tablou de Bord</h1>
    <hr>
    <a href="register.php">Creeaza un cont nou de administrator</a>
    <br>
    <a href="create.php">Adauga o intrebare noua +</a>
    <br>
    <a href="dictionar.php">Dictionar</a>
    <?php require_once "config.php";
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    $sql = "SELECT * FROM intrebari";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table class='tg'>";
                echo "<thead>";
                    echo "<tr>";
                        echo "<th class='tg-0l'>#</th>";
                        echo "<th class='tg-0l'>Intrebare</th>";
                        echo "<th class='tg-0l'>Raspuns</th>";
                        echo "<th class='tg-01'>Varianta 1</th>";
                        echo "<th class='tg-01'>Varianta 2</th>";
                        echo "<th class='tg-01'>Varianta 3</th>";
                        echo "<th class='tg-01'>Varianta 4</th>";
                        echo "<th class='tg-0l'>Actiuni</th>";

                    echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>" . $row['ID'] . "</td>";
                        echo "<td>" . $row['intrebare'] . "</td>";
                        echo "<td>" . $row['raspuns'] . "</td>";
                        echo "<td>" . $row['V1'] . "</td>";
                        echo "<td>" . $row['V2'] . "</td>";
                        echo "<td>" . $row['V3'] . "</td>";
                        echo "<td>" . $row['V4'] . "</td>";
                        echo "<td>";
                            echo "<a class='butoane' href='read.php?ID=". $row['ID'] ."' title='Afiseaza'>Read</a>";
                            echo "<a class='butoane' href='update.php?ID=". $row['ID'] ."' title='Actualizeaza'>Update</a>";
                            echo "<a class='butoane' href='delete.php?ID=". $row['ID'] ."' title='Sterge'>Delete</a>";
                        echo "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
            echo "</table>";
            // elibereaza setul de rezultate
            mysqli_free_result($result);
        } else{
            echo "<p><em>Nu au fost gasite inregistrari.</em></p>";
        }
    } else{
        echo "EROARE: Nu am putut executa $sql. " . mysqli_error($link);
    }

    // inchidere conexiune
    mysqli_close($link);




     ?>

  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
