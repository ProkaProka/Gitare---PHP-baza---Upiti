<?php
class Baza{
	var $host = 'localhost';
	var $user = 'root';
	var $pass = '';
	var $db = 'sretenprokopicit16/20';
	var $tb = 'gitaristi';
	
	public function veza()
	{
		$con = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
		return $con;
	}
	
	public function sacuvajRed($aa, $bb, $cc, $dd)
	{
		$conn=$this->veza();
		$upit = "INSERT INTO gitaristi (id, ime, prezime, prodao_se) VALUES ('{$aa}','{$bb}', '{$cc}', '{$dd}')";
		mysqli_query($conn, $upit) or die(mysqli_error($conn));
		echo "<div style='padding:20px; background-color:yellow;'> Podaci su uspesno dodati</div>";
		
	}
}
?>