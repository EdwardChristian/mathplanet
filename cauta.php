<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MathPlanet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

<style>
.rezultat {
  border:3px solid #654239; width:60%;
}

</style>

  </head>
  <body>
      <?php include "header.php"?>
        <center><h2>Dictionar teoretic de matematica</h2>
          <p>Termenul trebuie sa aiba minimum 3 caractere</p>
        <div>
        <form action="cauta.php" method="GET">
            <input type="text" name="query" />
            <input type="submit" value="Cauta" />
        </form>
        <br><hr>
      </div>
        <?php
        require_once "config.php";
        $query = $_GET['query'];
          // gets value sent over search form

        $min_length = 3;
          // you can set minimum length of the query if you want
           if(strlen($query) >= $min_length){
          // pregatim instructiunea
            $sql = "SELECT Termen, Descriere FROM dictionar WHERE (Termen LIKE '%".$query."%') OR (Descriere LIKE '%".$query."%')";
                if($result = mysqli_query($link, $sql)){
                    if(mysqli_num_rows($result) > 0){
                       echo "<h3>Rezultatele cautarii:</h3>";
                       echo "<br><br>";
                       $i = 1;
                        while($row = mysqli_fetch_array($result)){
                          echo "<div class='rezultat'>";
                          echo "<h2> ". $row['Termen'] ."</h2> <br>";
                          echo "<p> ". $row['Descriere'] ."</p>";
                          echo "</div>";
                          echo "<br>";
                        $i++;
                      }
                                mysqli_free_result($result);




           }else {
             echo "<h3>Nu am gasit niciun termen in baza de date pentru: $query</h3>";
           }}}

  mysqli_close($link);

         ?>
</center>
      <?php include "footer.php"?>
  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
