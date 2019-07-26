<?php
// Date de conectare baza de date MySQL
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mathplanet');

// Incercare de conectare
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Verificare conexiune
if($link === false){
    die("Eroare: Nu s-a putut realiza conectarea cu baza de date mySQL. " . mysqli_connect_error());
}
?>
