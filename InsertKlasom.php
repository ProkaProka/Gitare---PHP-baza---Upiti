<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="css/style.css">
        <title>Document</title>
    </head>
    <body>
		<img src="slike/border.jpg">
        <div class="main-nav">
            <ul class="main-nav_items">
                <li class="main-nav_item"><a href="unos.php">Unos gitarista</a></li>
                <li class="main-nav_item"><a href="pretraga.php">Pretraga gitarista</a></li>
                <li class="main-nav_item"><a href="brisanje.php">Brisanje gitarista</a></li>
                <li class="main-nav_item"><a href="prodati.php">Lista prodatih</a></li>
				<li class="main-nav_item"><a href="InsertKlasom.php">Primena klasa i metoda</a></li>
            </ul>
        </div>
		<h3>Klasa Baza i metode veza i sacuvajRed smestene su u datoteci Klase.php</h3>
		<p> Metoda <i>veza</i> - uspostavlja konekciju sa bazom; metoda <i>sacuvajRed</i> insertuje novi red u tabelu <i>gitaristi</i>.</p><br><br>
<form action="#" method="POST">
	ID: 		<input type="text" name="aa"/><br>
	Ime: 		<input type="text" name="bb"/><br>
	Prezime: 	<input type="text" name="cc"/><br>
	Prodao se: 	<input type="text" name="dd"/><br>
				<input type="submit" value= "   UBACI   " name="ubaci"/>
</form>
<?php
if (isset($_POST['ubaci']))
{
		include "Klase.php";
		$aa=$_POST['aa'];
		$bb=$_POST['bb'];
		$cc=$_POST['cc'];
		$dd=$_POST['dd'];

		$obj = new Baza();
		$obj->sacuvajRed($aa, $bb, $cc, $dd);		
}
?>
</html>