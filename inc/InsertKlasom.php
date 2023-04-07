<html>
<form action="#" method="post">
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