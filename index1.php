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
      <!-- slider-->
      <section id="slider">
        <!-- Slideshow container -->
<div class="slideshow-container">

  <!-- imagini -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 2</div>
    <img src="imagini\slider1.jpg" style="width:100%;" >
    <div class="text"><a href="joaca.php">Joaca!</a></div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 2</div>
    <img src="imagini\slide2.jpg" style="width:100%">
    <div class="text" style="right:0px; bottom:18%;"><a href="teorie.php">Teorie</a></div>
  </div>



  <!-- Next si prev -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- cerculetul -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
</div>
      </section>
      <!-- coloane continut-->
      <section id="content">
        <div class="row">
          <a id="despre"><div class="column" name="despre">
            <h2>Despre MathPlanet</h2>
            <p>Sunt pasionat de matematica, dornic sa-i ajut si pe altii sa o inteleaga si sa o iubeasca. <p>Imi doresc ca studierea matematicii sa fie placuta si pe intelesul tuturor, nu doar o obligatie scolara.</p></p>
          </div></a>
          <div class="column" name="contact">
            <h2>Contact</h2>
            <p>Pentru intrebari,sfaturi pentru a raporta o problema va rugam sa ne contactati la:</p>
            <p>exemplu@mathplanet.ro</p>
          </div>
      </section>
      <?php include "footer.php"?>
  </body>
  <script src="javascript.js" type="text/javascript"></script>
</html>
