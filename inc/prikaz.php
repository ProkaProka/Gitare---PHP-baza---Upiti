<?php	
	
	//prikaz podataka iz baze na stranici str0.php
	
		if(isset($_POST['submit'])){	
				
			require 'connect.php';
			$upit = "SELECT * FROM gitaristi";
			
			$result = mysqli_query($conn, $upit);
			
			if (mysqli_num_rows($result) > 0){
				while($row=mysqli_fetch_array($result)){
					echo "<hr><br>" . $row['id'] ." ". $row['ime'] ." ". $row['prezime'] ." ". $row['prodao_se'];
				}
			}else {	
				echo "Ne postoje podaci u tabeli";
			}
		}