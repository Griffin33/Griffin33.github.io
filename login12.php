<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="responsiveslides.min.js"></script>
             
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
</html>

<?php
if(isset($_POST["verzend"]))
{
if($_POST['username'] == 'root' and $_POST['password'] == 'usbw')
{
	header('Location: Tabel-aanpassing.php');
	$_SESSION['ingelogd'] == true;
} 
else
{
	echo 'Uw gebruikersnaam of wachtwoord was niet correct.';
} 
}
?>