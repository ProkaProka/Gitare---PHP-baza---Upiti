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
		<h3>Brisanje reda iz tabele gitaristi</h3><br><br>
        <form action="" method="POST">
    <label for="id">
                <span><br><br><br>Id gitariste koju brisete:<br><br></span>
                <input type="text" name="id">
    </label>
        <input type="submit" value="Obrisi" name="obrisi">
    </form>


<?php
    $pdo = new PDO("mysql:host=localhost; dbname=sretenprokopicit16/20", "root", "");
    $sql = "DELETE FROM gitaristi WHERE id=:id";

     $stmt = $pdo->prepare($sql);
     $stmt->bindParam(":id", $id);


    if (isset($_POST['obrisi'])) {
    $id = $_POST['id'];
    if ($id !== "") {
        $stmt->execute();
    echo "Uspesno ste obrisali gitaristu kojeg ste uneli!";
    }
 }
    ?>
</body>
</html>