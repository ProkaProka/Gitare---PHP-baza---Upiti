<?php
//Unos podatka preko forme u bazu 

	
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$ime = $_POST['ime'];
	$prezime = $_POST['prezime'];
    $prodao_se= $_POST['prodao_se'];
	
	require 'inc/connect.php';
	
	$id = mysqli_real_escape_string($conn, $id);
	$ime = mysqli_real_escape_string($conn, $ime);
	$prezime = mysqli_real_escape_string($conn, $prezime);
	$prodao_se = mysqli_real_escape_string($conn, $prodao_se);	
	
	if (!empty($id) && !empty($ime) && !empty($prezime) && !empty($prodao_se)){	
		$upit = "INSERT INTO gitaristi (id, ime, prezime, prodao_se) VALUES ('{$id}','{$ime}', '{$prezime}', '{$prodao_se}')";	
		mysqli_query($conn, $upit);
		echo "Podaci su uspesno uneti.";
	}else{
		echo "Podaci nisu uneti. Sva polja moraju biti popunjena!";
	}
}