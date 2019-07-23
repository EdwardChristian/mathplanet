<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MathPlanet</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

  <style>
.titlu-lectie {
    background-color:#4C4C4C; width:80%; margin:0 auto;
    font-size:30px; color:#E9A039;padding:10px;
    border: 3px solid #EBD8C8;
  }
  .lectie {
    background-color:#654239; width:80%; margin:0 auto;
    font-size:30px; height:20%; display:none; color:#EBD8C8;
  }
span {
  font-size:20px;
}

  </style>


  <script type="text/javascript">
  function FunctieArata1() {
    var x = document.getElementById("1");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  function FunctieArata2() {
    var x = document.getElementById("2");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  function FunctieArata3() {
    var x = document.getElementById("3");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  function FunctieArata4() {
    var x = document.getElementById("4");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  function FunctieArata5() {
    var x = document.getElementById("5");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  function FunctieArata6() {
    var x = document.getElementById("6");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  function FunctieArata7() {
    var x = document.getElementById("7");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  function FunctieArata8() {
    var x = document.getElementById("8");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  function FunctieArata9() {
    var x = document.getElementById("9");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }
  </script>
  </head>
  <body>
      <?php include "header.php"?>

      <section class="teorie" style="text-align:center;">
        <div>
          <h2 style="font-size:50px;">Invata matematica!</h2>
<hr>
        </div>


        <div class="titlu-lectie"  onclick="FunctieArata1()">
          <span style="font-size:30px;">Teorema lui Pitagora</span>
        </div>
        <div class="lectie" id="1">
          <br>
          <span>Teorema lui Pitagora este una dintre cele mai cunoscute teoreme din geometria euclidiană, constituind o relație între cele trei laturi ale unui triunghi dreptunghic. Teorema lui Pitagora afirmă că în orice triunghi dreptunghic, suma pătratelor catetelor este egală cu pătratul ipotenuzei (latura opusă unghiului drept). Teorema poate fi scrisă sub forma unei relații între cele trei laturi a, b și c, câteodată denumită relația lui Pitagora:</span>
          <br>
          <span><strong>a^2+b^2=c^2</strong></span>
          <br>
          <span><em>unde c reprezintă lungimea ipotenuzei, iar a și b lungimile celorlalte două laturi ale triunghiului.</em></span>
          <br>
          <img src="imagini\pitagora.png" height="30%;"></img>
        </div>

        <div class="titlu-lectie"  onclick="FunctieArata2()">
          <span style="font-size:30px;">Teorema lui Thales</span>
        </div>
        <div class="lectie" id="2">
          <br>
          <span>O paralela dusa la una din laturile unui triunghi
determina pe celelalte doua laturi segmente
proportionale.</span>
          <br>
          <span><strong>EF || BC -> (AE/EB)=(AF/FC)</strong></span>
          <br>
          <img src="imagini\thales.png" height="55%;"></img>
        </div>

        <div class="titlu-lectie"  onclick="FunctieArata3()">
          <span style="font-size:30px;">Teorema cosinusului</span>
        </div>
        <div class="lectie" id="3">
          <br>
          <span>În geometria plană, teorema cosinusului, cunoscută și sub numele de teorema lui Pitagora generalizată stabilește relația dintre lungimea unei laturi a unui triunghi în funcție de celelalte două laturi ale sale și cosinusul unghiului dintre ele.</span>
          <br>
          <span><strong>BC^2 = AB^2 + AC^2 - 2(AB)(AC)cosA</strong></span>
          <br><br>
        </div>

        <div class="titlu-lectie"  onclick="FunctieArata4()">
          <span style="font-size:30px;">Teorema fundamentală a algebrei</span>
        </div>
        <div class="lectie" id="4">
          <br>
          <span>Teorema fundamentală a algebrei afirmă că orice polinom neconstant cu o singură variabilă și coeficienți complecși are cel puțin o rădăcină complexă. Întrucât mulțimea numerelor reale este inclusă în cea complexă, automat include și polinoamele cu coeficienți reali.</span>
          <br>

          <br>

        </div>

        <div class="titlu-lectie"  onclick="FunctieArata5()">
          <span style="font-size:30px;">Teorema fundamentală a aritmeticii</span>
        </div>
        <div class="lectie" id="5">
          <br>
          <span>Teorema fundamentală a aritmeticii sau Teorema factorizării unice este o teoremă care afirmă că orice număr întreg poate fi exprimat în mod unic ca produs de numere prime.</span>
          <br>

          <br>

        </div>

        <div class="titlu-lectie"  onclick="FunctieArata6()">
          <span style="font-size:30px;">Teorema medianei</span>
        </div>
        <div class="lectie" id="6">
          <br>
          <span>În geometria plană, teorema medianei stabilește o relație între lungimea unei mediane dintr-un triunghi și lungimile laturilor triunghiului..</span>
          <br>
          <span><strong>Într-un triunghi dreptunghic lungimea medianei corespunzătoare unghiului drept este egală cu jumătate din lungimea ipotenuzei.</strong></span>
          <br>
          <img src="imagini\mediana.png" height="55%;"></img>
        </div>

        <div class="titlu-lectie"  onclick="FunctieArata7()">
          <span style="font-size:30px;">Teorema sinusurilor</span>
        </div>
        <div class="lectie" id="7">
          <br>
          <span>În geometrie, teorema sinusurilor este o teoremă care stabilește relația dintre valorile laturilor unui triunghi și sinusurile unghiurilor dintre ele.</span>
          <br>
          <br>
          <img src="imagini\sinus.png" height="55%;"></img>
        </div>

        <div class="titlu-lectie"  onclick="FunctieArata8()">
          <span style="font-size:30px;">Teorema bisectoarei</span>
        </div>
        <div class="lectie" id="8">
          <br>
          <span>În geometrie, teorema bisectoarei exprimă o relație între lungimile segmentelor determinate de bisectoarea unui unghi al triunghiului pe latura pe care cade și cele ale laturilor acelui unghi.</span>
          <br>
          <span><strong>Într-un triunghi ABC, bisectoarea unghiului A determină pe latura opusă (BC) segmente proporționale cu laturile triunghiului:</strong></span>
          <br>
          <img src="imagini\bisectoare.png" height="55%;"></img>
        </div>

        <div class="titlu-lectie"  onclick="FunctieArata9()">
          <span style="font-size:30px;">Teorema ariilor</span>
        </div>
        <div class="lectie" id="9">
          <br>
          <span>În orice triunghi dreptunghic, produsul lungimii catetelor este egal cu produsul dintre lungimea ipotenuzei și lungimea înălțimii corespunzătoare acesteia. Justificarea este imediată, considerând că aria triunghiului are aceeași valoare, indiferent de care latură este considerată "bază".</span>
          <br>
          <span><strong>Consecință: Lungimea înălțimii dusă din vârful unghiului drept este egală cu produsul lungimii catetelor împărțit la lungimea ipotenuzei.</strong></span>
          <br><br>

        </div>


      </section>
<br><br>
      <?php include "footer.php"?>
      </section>
  </body>
    <script src="javascript.js" type="text/javascript"></script>
</html>
