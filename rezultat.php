<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MathPlanet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body>
      <?php include "header.php"?>
      <?php
      session_start();


      //obtinere raspunsuri corecte
      $rasp_corect1 = $_SESSION["R_corect1"];
      $rasp_corect2 = $_SESSION["R_corect2"];
      $rasp_corect3 = $_SESSION["R_corect3"];
      $rasp_corect4 = $_SESSION["R_corect4"];
      $rasp_corect5 = $_SESSION["R_corect5"];
      $rasp_corect6 = $_SESSION["R_corect6"];
      $rasp_corect7 = $_SESSION["R_corect7"];
      $rasp_corect8 = $_SESSION["R_corect8"];
      $rasp_corect9 = $_SESSION["R_corect9"];
      $rasp_corect10 = $_SESSION["R_corect10"];



      //obtinere raspunsuri trimise
      $rasp_trimis1 = $_POST['intrebare-1-raspuns'];
      $rasp_trimis2 = $_POST['intrebare-2-raspuns'];
      $rasp_trimis3 = $_POST['intrebare-3-raspuns'];
      $rasp_trimis4 = $_POST['intrebare-4-raspuns'];
      $rasp_trimis5 = $_POST['intrebare-5-raspuns'];
      $rasp_trimis6 = $_POST['intrebare-6-raspuns'];
      $rasp_trimis7 = $_POST['intrebare-7-raspuns'];
      $rasp_trimis8 = $_POST['intrebare-8-raspuns'];
      $rasp_trimis9 = $_POST['intrebare-9-raspuns'];
      $rasp_trimis10 = $_POST['intrebare-10-raspuns'];


      //initializare var nota si resetare
      $totalCorrect = 0;

      if ($rasp_trimis1 == $rasp_corect1) { $totalCorrect++; }
      if ($rasp_trimis2 == $rasp_corect2) { $totalCorrect++; }
      if ($rasp_trimis3 == $rasp_corect3) { $totalCorrect++; }
      if ($rasp_trimis4 == $rasp_corect4) { $totalCorrect++; }
      if ($rasp_trimis5 == $rasp_corect5) { $totalCorrect++; }
      if ($rasp_trimis6 == $rasp_corect6) { $totalCorrect++; }
      if ($rasp_trimis7 == $rasp_corect7) { $totalCorrect++; }
      if ($rasp_trimis8 == $rasp_corect8) { $totalCorrect++; }
      if ($rasp_trimis9 == $rasp_corect9) { $totalCorrect++; }
      if ($rasp_trimis10 == $rasp_corect10) { $totalCorrect++; }

      echo "<div class='container-rezultat'>";

      echo "<h1>Nota obtinuta este: " . $totalCorrect . "</h1>";

      echo "<div id='rezultat'>Ati avut $totalCorrect din 10 raspunsuri corecte.<br><br> Ati obtinut nota $totalCorrect</div><br>";

      echo "</div>";

      session_destroy();

       ?>






      <?php include "footer.php"?>
  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
