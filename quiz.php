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
      <?php include "header.php" ?>
        <section class="quiz">
          <div id="timer" style="position:fixed;font-size:20px; left:30px;top:100px;"></div>
          <?php

          session_start();
          $nume = $_POST["nume"];

          require_once "config.php";
          $i = 1;
          $sql = "SELECT * FROM " . "intrebari" .  " order by RAND() LIMIT 10";
          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                echo "<br><br><br>";
                echo "<h2 style='text-align:center;'>Mult noroc  $nume !</h2>";
                echo "<br>";
          			echo "<form id='testare' action='rezultat.php' method='post'>";
                      echo "<ol class='lista-intrebari'>";

          		$i = 1;
                  while($row = mysqli_fetch_array($result)){
          			$_SESSION["id_Q"] = $row['ID']; //nu avem neaparat nevoie de aceasta variabila in varianta finala
          			$_SESSION["R_corect"] = $row['raspuns']; //nu avem neaparat nevoie de aceata variabila in varianta finala

          		//introducere raspunsuri corecte in array
          		$rasp_corecte[] = $row['raspuns'];

          		//numaram intrebarile pentru markup html id si nume
          		$nrq[] = $row['ID'];
                if(($row['V1'] && $row['V2'] && $row['V3'] && $row['V4']) == 0 )
                    {
                  echo "        <li>";
                  echo "            <h3>" . $row['intrebare'] . "</h3>";
                  echo "            <div>";
                  echo "<br>";
                  echo "            <input type='text' name='intrebare-".$i."-raspuns' placeholder='Introdu raspunsul tau!' > ";
                  echo "            </div>";
                  echo "<br>";
                  echo "        </li>";
                  echo "<br>";
          		$i++;
            }else {

              echo "        <li>";
              echo "            <h3>" . $row['intrebare'] . "</h3>";
              echo "						<div class='row'>";
              echo "            <div class='column-quiz' style='margin-left:30%;'>";
              echo "                <input type='radio' name='intrebare-".$i."-raspuns' id='intrebare-".$i."-raspuns-A' value='a' />";
              echo "                <label for='intrebare-".$i."-raspuns-A'>a) " . $row['V1'] . "</label>";
              echo "            </div>";
              echo "            <div class='column-quiz'>";
              echo "                <input type='radio' name='intrebare-".$i."-raspuns' id='intrebare-".$i."-raspuns-B' value='b' />";
              echo "                <label for='intrebare-".$i."-raspuns-B'>b) " . $row['V2'] . "</label>";
              echo "            </div>";
              echo "            <div class='column-quiz'>";
              echo "                <input type='radio' name='intrebare-".$i."-raspuns' id='intrebare-".$i."-raspuns-C' value='c' />";
              echo "                <label for='intrebare-".$i."-raspuns-C'>c) " . $row['V3'] . "</label>";
              echo "            </div>";
              echo "            <div class='column-quiz'>";
              echo "                <input type='radio' name='intrebare-".$i."-raspuns' id='intrebare-".$i."-raspuns-D' value='d' />";
              echo "                <label for='intrebare-".$i."-raspuns-D'>d) " . $row['V4'] . "</label>";
              echo "            </div>";
              echo "						</div>";
              echo "        </li>";
              echo "<br>";
          $i++;
            }

          }
                  echo "    </ol>";
                  echo "<br>";
                  echo "<br>";
                  echo "    <input type='submit' value='Trimite Test' class='buton-trimitere'/>";
                  echo "<br>";
          		echo "</form>";

                  mysqli_free_result($result);

                  		//salvare raspunsuri corecte in 10 variabile globale
                  		$_SESSION["R_corect1"] = $rasp_corecte[0];
                      $_SESSION["R_corect2"] = $rasp_corecte[1];
                      $_SESSION["R_corect3"] = $rasp_corecte[2];
                      $_SESSION["R_corect4"] = $rasp_corecte[3];
                      $_SESSION["R_corect5"] = $rasp_corecte[4];
                      $_SESSION["R_corect6"] = $rasp_corecte[5];
                      $_SESSION["R_corect7"] = $rasp_corecte[6];
                      $_SESSION["R_corect8"] = $rasp_corecte[7];
                      $_SESSION["R_corect9"] = $rasp_corecte[8];
                      $_SESSION["R_corect10"] = $rasp_corecte[9];




                      } else{
                          echo "Nici un rand.";
                      }
                  } else{
                      echo "Eroare: $sql. " . mysqli_error($link);
                  }

                  // Close connection
                  mysqli_close($link);



          ?>

        </section>

      <?php include "footer.php" ?>
  </body>
  <script type="text/javascript">
            var timer,
            timeleft = 600; // in secunde

        function timp()
        {
            var minute = Math.floor(timeleft / 60);
            var seconds = timeleft % 60;

            if (timeleft >= 0)
            {
                if (minute < 10)
                {
                    minute = "0" + minute;
                }

                if (seconds < 10)
                {
                    seconds = "0" + seconds;
                }

                document.getElementById("timer").innerHTML = minute + ":" + seconds;
            }


            if (timeleft <= 0)
            {
                clearTimeout(timer);
                document.getElementById("testare").submit();

                return;
            }

            timeleft--;

            timer = setTimeout(timp, 1000);

        }

        timp();
        </script>
  <script src="javascript.js" type="text/javascript"></script>
</html>
