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
		<h3>Prema zadatom ID izdvaja red iz tabele <i>gitaristi</i></h3><br><br>
        <form action="" method="POST">
            <label for="id">
                <span>Id gitariste:</span>
                <input type="text" name="id">
            </label>
                <input type="submit" value="Pronadji" name="pronadji">
        </form>
    <?php
        $mysqli = new mysqli("localhost", "root", "", "sretenprokopicit16/20");
        if($mysqli->connect_errno){
          echo "greska u konekciji";
            exit();
         }
        echo "konekcija uspesna <br>";

    $sql = "SELECT * FROM gitaristi WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $id);
    
    if(isset($_POST['pronadji'])){
        $id = $_POST['id'];
        if($id !== ""){
            
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if($mysqli->affected_rows > 0) {
                echo $row['id'] . "<br>" . $row['ime'] . "<br>" . $row['prezime'] . "<br>" . $row['prodao_se'];
            }else{
                echo "Ne postoji gitarista sa tim identifikacionim brojem";
            }
        }
    }

    

    ?>
    </body>
</html>