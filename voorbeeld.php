<?php 
// Hier worden de verbindingsgegevens opgehaald
include "connect.php";

// Hier wordt connectie gemaakt met de database
$mysql = mysqli_connect($server,$user,$pass,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

// Hier wordt gecontroleerd of er op de verzend-knop is geklikt
if(isset($_POST["verzend"]))
{
// Hier worden de ingevulde gegevens veilig opgehaald uit het formulier
$MODELNR = mysqli_real_escape_string($mysql,$_POST["Modelnummer"]);	
$MODELNAAM = mysqli_real_escape_string($mysql,$_POST["Modelnaam"]);
$PRO_JAAR = mysqli_real_escape_string($mysql,$_POST["Productiejaar"]);
$PRIJS = mysqli_real_escape_string($mysql,$_POST["Prijs"]);
$TECHNIEK = mysqli_real_escape_string($mysql,$_POST["Techniek"]);

if (empty($_POST['Modelnummer'])) {
	echo'Modelnummer niet ingevuld!<br />'; 
}
if (empty($_POST['Modelnaam'])) { 
	echo'Modelnaam niet ingevuld!<br />'; 
}
if (empty($_POST['Productiejaar'])) {
	echo'Productiejaar niet ingevuld!<br />'; 
}
if (empty($_POST['Prijs'])) { 
	echo'Prijs niet ingevuld!<br />'; 
}
if (empty($_POST['Techniek'])) { 
	echo'Techniek niet ingevuld!<br />'; 
} 

else{
// Hier wordt het artikel toegevoegd aan de database
mysqli_query($mysql,"INSERT INTO auto(MODELNR,MODELNAAM,PRO_JAAR,PRIJS,TECHNIEK) VALUES('$MODELNR','$MODELNAAM','$PRO_JAAR','$PRIJS','$TECHNIEK')") or die("De insertquery op de database is mislukt!");
}

}

// Verbinding weer sluiten
mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
?>

<html>
<head>
<title>Artikel toevoegen</title>
</head>
<body>
<form action="script5.php" method="post">
Vul het modelnummer in: <input type="text" name="Modelnummer" /><br /><br />
Vul de modelnaam in: <input type="text" name="Modelnaam" /><br /><br />
Vul de productiejaar in: <input type="text" name="Productiejaar" /><br /><br />
Vul de verkoopprijs in: <input type="text" name="Prijs" /><br /><br />
Vul de techniek in: <input type="text" name="Techniek" /><br /><br />
<input type="submit" name="verzend" value="Voeg artikel toe" />
</form>
</body>
</html>
