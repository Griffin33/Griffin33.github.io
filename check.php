<?php
if($_SESSION['ingelogd'] != true){
header('Location: bronnen.html'); //weer even inloggen
} ?>

<?php
include_once('check.php');
?>
