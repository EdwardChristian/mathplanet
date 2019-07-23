<html>
  <head>
      <title>MathPlanet</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
          body {
            background-color: #000;

          }
          img[usemap] {
  border: none;
  height: 100%;
  max-width: 100%;
  width: auto;
}
@media screen and (max-width: 660px) {
  img[usemap] {
    height:50%;
  }
}
        </style>
  </head>

  <body><center>
    <img src="imagini\landing.jpg" width="1800" height="1013" usemap="#map">
  </center>

    <map name="map">
    <area target="_self" alt="Teorie" title="Teorie" href="teorie.php" coords="727,684,697,671,650,677,630,657,610,617,616,571,635,525,667,488,700,482,739,477,753,501,782,512,788,496,815,501,837,510,858,530,871,555,898,604,920,636,821,663" shape="poly">
    <area target="_self" alt="Dictionar Teoretic" title="Dictionar Teoretic" href="dictionar.php" coords="732,685,914,638,960,636,950,668,890,733,898,789,871,827,853,870,818,870,769,813,758,757,731,717" shape="poly">
    <area target="_self" alt="Despre" title="Despre" href="despre.php" coords="925,625,866,533,848,510,864,504,867,480,826,475,826,458,863,458,925,458,945,482,955,526,925,517,942,538,958,553,982,545,999,561,993,584,960,609" shape="poly">
    <area target="_self" alt="Acasa" title="Acasa" href="index1.php" coords="667,473,673,446,697,442,713,427,712,411,755,392,772,359,831,329,886,337,945,319,998,319,1049,327,942,427,926,453,850,448,799,471" shape="poly">
    <area target="_self" alt="Joaca" title="Joaca" href="joaca.php" coords="963,534,958,472,944,434,979,401,1057,332,1108,358,1141,396,1181,437,1190,469,1216,531,1212,571,1205,647,1158,566,1115,596,1096,650,1066,566,1020,539,991,541" shape="poly">
</map>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="jquery.rwdImageMaps.js"></script>
<script>
$(document).ready(function(e) {
    $('img[usemap]').rwdImageMaps();
});
</script>
  </body>


</html>
