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
        <center><h2>Dictionar teoretic de matematica</h2>
        <div>
          <p>Termenul trebuie sa aiba minimum 3 caractere</p>
        <form action="cauta.php" method="GET">
            <input type="text" name="query" />
            <input type="submit" value="Cauta!" />
        </form>
      </div><br>
      </center>
      <?php include "footer.php"?>
  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
