<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
	<title>Artikel toevoegen</title>
	<link rel="stylesheet" type="text/css" href="stijl2.css" />
 </head>
<body>

<ul>
<FONT size="5"><li><a href="index.html">Home</a></li>
<li><a href="informatie volkswagen-golf.html">Geschiedenis</a></li>
<li><a href="marketingmix.html">Marketingmix-VW</a></li>
<li><a href="golf7.html">Golf7</a></li>
<li><a href="autozoeken1.php">Kies een Golf</a></li>
<li><a href="bronnen.html">Beheerderspaneel</a></li>
<li><a href="m-en-c.html">Media en contact</a></li>
</ul>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<h1 class="pagina1">Het tabel aanpassen</h1>

<p>
<b>Een artikel toevoegen</b>:
<br>
<p>

<form action="Tabel-aanpassing.php" method="post">
Vul het modelnummer in: <input type="text" name="Modelnummer1" /><br /><br />
Vul de modelnaam in: <input type="text" name="Modelnaam" /><br /><br />
Vul de productiejaar in: <input type="text" name="Productiejaar" /><br /><br />
Vul de verkoopprijs in: <input type="text" name="Prijs1" /><br /><br />
Vul de techniek in: <input type="text" name="Techniek" /><br /><br />
<input type="submit" name="verzend1" value="Voeg artikel toe" ><br/>

<?php 
// Hier worden de verbindingsgegevens opgehaald
include "connect.php";

// Hier wordt connectie gemaakt met de database
$mysql = mysqli_connect($server,$user,$pass,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

// Hier wordt gecontroleerd of er op de verzend-knop is geklikt
if(isset($_POST["verzend1"]))
{
// Hier worden de ingevulde gegevens veilig opgehaald uit het formulier
$MODELNR1 = mysqli_real_escape_string($mysql,$_POST["Modelnummer1"]);	
$MODELNAAM = mysqli_real_escape_string($mysql,$_POST["Modelnaam"]);
$PRO_JAAR = mysqli_real_escape_string($mysql,$_POST["Productiejaar"]);
$PRIJS1 = mysqli_real_escape_string($mysql,$_POST["Prijs1"]);
$TECHNIEK = mysqli_real_escape_string($mysql,$_POST["Techniek"]);

if (empty($_POST['Modelnummer1'])) {
	echo'Modelnummer niet ingevuld!<br />'; 
}
if (empty($_POST['Modelnaam'])) { 
	echo'Modelnaam niet ingevuld!<br />'; 
}
if (empty($_POST['Productiejaar'])) {
	echo'Productiejaar niet ingevuld!<br />'; 
}
if (empty($_POST['Prijs1'])) { 
	echo'Prijs niet ingevuld!<br />'; 
}
if (empty($_POST['Techniek'])) { 
	echo'Techniek niet ingevuld!<br />'; 
} 

else{
// Hier wordt het artikel toegevoegd aan de database
mysqli_query($mysql,"INSERT INTO auto(MODELNR,MODELNAAM,PRO_JAAR,PRIJS,TECHNIEK) VALUES('$MODELNR1','$MODELNAAM','$PRO_JAAR','$PRIJS1','$TECHNIEK')") or die("De insertquery op de database is mislukt!");
echo 'Gelukt!<br />';
}

}
// Verbinding weer sluiten
mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
?> 
-------------------------------------------------------------------------------------------------------------------------

<?php 
// Hier worden de verbindingsgegevens opgehaald
include "connect.php";

// Hier wordt connectie gemaakt met de database
$mysql = mysqli_connect($server,$user,$pass,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

// Hier wordt gecontroleerd of er op de verzend-knop is geklikt
if(isset($_POST["verzend2"]))
{
// Hier worden de ingevulde gegevens veilig opgehaald uit het formulier
$MODELNR = mysqli_real_escape_string($mysql,$_POST["Modelnummer"]);	
$PRIJS2 = mysqli_real_escape_string($mysql,$_POST["Prijs2"]);

if (empty($_POST['Prijs2'])) { 
   echo'De prijs is nog niet ingevuld!<br />'; 
}

else
{
// Hier wordt de prijs gewijzigd in de database
mysqli_query($mysql,"UPDATE auto SET PRIJS = '$PRIJS2' WHERE MODELNR = '$MODELNR'") or die("De updatequery op de database is mislukt!");	
echo 'Gelukt!<br />';
}
}

// Artikelen opvragen uit de database
$resultaat = mysqli_query($mysql,"SELECT * FROM auto") or die("De query op de database is mislukt!");

// Verbinding weer sluiten
mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
?>
<p>
<b>Een artikel toevoegen</b>:
<br>
<p>

Kies een artikel: <select name="Modelnummer">

<?php
// Hier worden alle artikelen uit de database getoond in de keuzelijst
while(list($MODELNR,$MODELNAAM,$PRO_JAAR,$PRIJS,$TECHNIEK) = mysqli_fetch_row($resultaat))
{
echo"<option value='$MODELNR'>$MODELNR $PRO_JAAR $PRIJS $TECHNIEK</option>";
}
?> 

</select><br /><br />
Vul de nieuwe prijs in: <input type="text" name="Prijs2" /><br /><br />
<input type="submit" name="verzend2" value="Verzend" />

</form>
</div>
</body>
</html>	
