<?php
	if (isset($_GET['remove_id'])) {
		$id=$_GET['remove_id'];
		
		require 'connect.php';
		$upit = "DELETE FROM gitaristi WHERE id = '{$id}'";
		mysqli_query($conn, $upit);
		header('Location: ../str3.php');
	}
?>