<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
	
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
<h1 class="pagina1">Een volkswagen Golf uitzoeken</h1>

<p>
<b>Op naam zoeken (Volkswagen Golf 1, Volkswagen Golf 2, etc...)</b>:
<br>

<form action="autozoeken1.php" method="post">
Vul een modelnaam in: <input type="text" name="MODELNAAM" />
<input type="submit" name="verzend1" value="Verzend" /><br/><br/>

<?php
// Hier worden de verbindingsgegevens opgehaald
include "connect.php";

// Hier wordt connectie gemaakt met de database
$mysql = mysqli_connect($server,$user,$pass,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

// Hier wordt gecontroleerd of er op de zoek-knop is geklikt
if(isset($_POST["verzend1"]))
{

// Hier worden de ingevulde gegevens veilig opgehaald uit het formulier
$MODELNAAM = mysqli_real_escape_string($mysql,$_POST["MODELNAAM"]);

if (empty($_POST['MODELNAAM'])) { 
   echo'Je hebt nog niks ingevuld!<br />'; 
}

else{
// Gegevens opvragen uit de database
$resultaat = mysqli_query($mysql,"SELECT * FROM AUTO WHERE MODELNAAM = '$MODELNAAM'") or die("De selectquery op de database is mislukt!");
mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");


// Hier worden de opgehaalde artikelen getoond
 while(list($MODELNR,$MODELNAAM,$PRO_JAAR, $PRIJS, $TECHNIEK) = mysqli_fetch_row($resultaat))
	 {
	  	echo"$MODELNR $MODELNAAM $PRO_JAAR $PRIJS $TECHNIEK<br /><br />";
	 }
}
}
?>

------------------------------------------------------------------------------------------------------------------

<?php 
// Hier worden de verbindingsgegevens opgehaald
include "connect.php";

// Hier wordt connectie gemaakt met de database
$mysql = mysqli_connect($server,$user,$pass,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

// Categoriën opvragen uit de database
$resultaat1 = mysqli_query($mysql,"SELECT DISTINCT TECHNIEK FROM AUTO") or die("De query 1 op de database is mislukt!");

// Verbinding weer sluiten
mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");
?>

<p>
<b>Op brandstoftype zoeken</b>:
<br>
<p>

Kies een brandstoftype: <select name="TECHNIEK">
<?php
// Hier worden alle verschillende categoriën uit de database getoond in de keuzelijst
while(list($TECHNIEK) = mysqli_fetch_row($resultaat1))
{
echo"<option value='$TECHNIEK'>$TECHNIEK</option>";
}
?> 

</select>
<input type="submit" name="verzend2" value="Verzend" /><br/><br/>

<?php
// Hier wordt gecontroleerd of er op de zoek-knop is geklikt
if(isset($_POST["verzend2"]))
{
// Hier wordt connectie gemaakt met de database
$mysql = mysqli_connect($server,$user,$pass,$db) or die("Fout: Er is geen verbinding met de MySQL-server tot stand gebracht!");

// Hier worden de ingevulde gegevens veilig opgehaald uit het formulier
$TECHNIEK = mysqli_real_escape_string($mysql,$_POST["TECHNIEK"]);

// Gegevens opvragen uit de database
$resultaat2 = mysqli_query($mysql,"SELECT * FROM AUTO WHERE TECHNIEK = '$TECHNIEK'") or die("De selectquery op de database is mislukt!");

// Verbinding weer sluiten
mysqli_close($mysql) or die("Het verbreken van de verbinding met de MySQL-server is mislukt!");

// Hier worden de opgehaalde artikelen getoond
 while(list($MODELNR,$MODELNAAM,$PRO_JAAR,$PRIJS, $TECHNIEK) = mysqli_fetch_row($resultaat2))
	 {
	  	echo"$MODELNR $MODELNAAM $PRO_JAAR $PRIJS $TECHNIEK <br />";
	 }
}
?>
</form>
</div>
</body>
</html>		
