<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1 ">
    <title>Rekenmachine</title>
  </head>
  <body>
<form action="" method="post">
Getal 1: <input type="text" name="getal1" /><br /><br />
Getal 2: <input type="text" name="getal2" /><br /><br />
<input type="submit" name="verzend" value="TEL OP" />
</form>
<br /><br />
<?php
// Hier wordt gecontroleerd of er op de verzendknop is geklikt
if(isset($_POST["verzend"]))
{
// Hier wordt alle input opgehaald
$getal1 = $_POST["getal1"];
$getal2 = $_POST["getal2"];

// Hier wordt de berekening gemaakt
$antwoord = $getal1 + $getal2;

// Hier wordt het antwoord getoond
echo"$getal1 + $getal2 = $antwoord";
}
?>
  </body>
</html>