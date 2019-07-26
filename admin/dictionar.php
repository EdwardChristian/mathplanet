<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MathPlanet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_admin.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>
  <br>
    <h1>Tablou de bord pentru Dictionar</h1>
    <br><hr>
    <a href="create1.php">Adauga termen nou +</a>
    <br>
    <a href="index.php">Inapoi </a>
    <?php require_once "config.php";
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: login.php");
        exit;
    }
    $sql = "SELECT * FROM dictionar";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
          echo "<table class='tg'>";
              echo "<thead>";
                  echo "<tr>";
                      echo "<th class='tg-0l'>#</th>";
                      echo "<th class='tg-0l'>Termen</th>";
                      echo "<th class='tg-0l'>Descriere</th>";
                      echo "<th class='tg-0l'>Actiuni</th>";

                  echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td>" . $row['Termen'] . "</td>";
                      echo "<td>" . $row['Descriere'] . "</td>";
                      echo "<td>";
                          echo "<a class='butoane' href='read1.php?ID=". $row['id'] ."' title='Afiseaza'>Read</a>";
                          echo "<a class='butoane' href='update1.php?ID=". $row['id'] ."' title='Actualizeaza'>Update</a>";
                          echo "<a class='butoane' href='delete1.php?ID=". $row['id'] ."' title='Sterge'>Delete</a>";
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
