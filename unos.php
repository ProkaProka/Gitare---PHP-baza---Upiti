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
        </div>
		<h3>Unos novog reda u tabelu  <i>gitaristi</i></h3><br><br>
        <form action="" method="POST">
            <label for="id">
                <span>Id gitariste:</span>
                <input type="text" name="id">
            </label>
            <label for="ime">
                <span>Ime:</span>
                <input type="text" name="ime">
            </label>
            <label for="prezime">
                <span>Prezime:</span>
                <input type="text" name="prezime">
            </label>
            <label for="prodao_se">
                <span>Prodao se:</span>
                <input type="text" name="prodao_se">
            </label>
                <input type="submit" value="Unesi" name="unesi">
        </form>
        <?php
            try{
                $pdo = new PDO("mysql:host=localhost; dbname=sretenprokopicit16/20", "root", "");
                echo "Konekcija uspesna <br>";
                
                $sql = "INSERT INTO gitaristi(id, ime, prezime, prodao_se) VALUES (:id, :ime, :prezime, :prodao_se)";
                
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->bindParam(":ime", $ime);
                $stmt->bindParam(":prezime", $prezime);
                $stmt->bindParam(":prodao_se", $prodao_se);
                
                if(isset($_POST['unesi'])){
                    $id = $_POST['id'];
                    $ime = $_POST['ime'];
                    $prezime = $_POST['prezime'];
                    $prodao_se = $_POST['prodao_se'];
                    
                    if($id !== "" && $ime !== "" && $prezime !== "" && $prodao_se !== ""){
                        if(strlen($ime) < 2){
                            echo "<br>Ime mora da sadrzi minimum 3 karaktera";
                        }elseif(strlen($prezime) < 2){
                            echo "<br>Prezime mora da sadrzi minimum 3 karaktera";
                        }elseif(strlen($prodao_se)!=2){
                            echo "<br>Mozes uneti samo Da ili Ne";
                        }elseif(filter_var($id, FILTER_VALIDATE_INT) == false) {
                            echo "Id je samo broj";
                        }elseif (ctype_lower($prodao_se) !== true) {
                             echo " Mogu samo mala slova!";
                        
                        }else{
                            $stmt->execute();
                            echo "Gitarista unet u bazu";
                        }
                    }
                }
                    
                    
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            
        
        ?>
    </body>
</html>
