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
      <?php include "header.php";
      session_start();
      ?>
      <section>

        <div class="main-joaca">
          <h3> Testeaza-ti abilitatea matematica!</h3>
          <h4> Introdu numele tau:</h4>
          <form name="form" method="post" onsubmit="return valideazaForm()" action="quiz.php">
              <input name="nume" type="text" placeholder="Nume">
              <input value="START" type="submit" href="quiz.php">
          </form>

        </div>



      </section>



      <?php include "footer.php"?>
  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
