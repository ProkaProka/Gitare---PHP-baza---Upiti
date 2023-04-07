<?php
	$serverName	= 'localhost';
	$userName = 'root';
	$password ='';
	$dbName	= 'sretenprokopicit16/20';
	
    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
	
    if($conn == FALSE){
        echo "Neuspesno povezivanje sa bazom.";
        exit();
    }
/*    echo "Uspesno povezivanje sa bazom. <br>"; */