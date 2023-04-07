<?php
	if(isset($_POST['delete'])){
		require 'connect.php';
		
		$upit = "SELECT * FROM gitaristi";
		$rez = mysqli_query($conn, $upit);
		if(mysqli_num_rows($rez) > 0 ){
			echo "<table><tr>
			<td>ID</td>
			<td>Ime</td>
			<td>Prezime</td>
			<td>Prodao se</td>
			<td>Obrisi gitaristu</td>
			</tr>
			";
			while ($row = mysqli_fetch_array($rez)) {
				?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['ime']; ?></td>
					<td><?php echo $row['prezime']; ?></td>
					<td><?php echo $row['prodao_se']; ?></td>
					<td><a href="inc/remove.php?remove_id=<?php echo $row['id'];?>">Obrisi</a></td>
				</tr>
				<?php
			}	
			echo "</table>";
		}
	}
?>