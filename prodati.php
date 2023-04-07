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
		<h3>Prikaz samo gitarisat koji u polju prodao_se ima upisano da</h3><br><br>
        <?php
    try{
        $pdo = new PDO("mysql:host=localhost; dbname=sretenprokopicit16/20", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Konekcija uspela <br><br>";
        
        $pdo->beginTransaction();
        
        $sql = "SELECT id, ime, prezime FROM gitaristi WHERE prodao_se=:prodao_se";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":prodao_se", $prodao_se);
        $prodao_se = "ne";
        $stmt->execute();
        $result = $stmt->fetchAll();
        
        foreach($result as $row){
            $id = $row['id'];
            $ime= $row['ime'];
            $prezime = $row['prezime'];
			echo $id . ", " . $ime . $prezime . "<br>";
        }
        
        
        $sql = "UPDATE gitaristi SET prodao_se = :prodao_se WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        if($prodao_se === "ne"){
            $prodao_se = "da";
        }else{
            $prodao_se = "ne";
        }
        $stmt->bindParam(":prodao_se", $prodao_se);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        echo "Za gitaristu sa registracionim brojem" . $stmt->bindParam(":id", $id) . "se ispostavilo da se ipak prodao! <br>";

        $pdo->commit();



        $sql1 = "DROP PROCEDURE IF EXISTS get_prezime";
        $sql2 = "CREATE PROCEDURE get_prezime(
            in ident INT, out prezimeGitar VARCHAR(30)
            )
            BEGIN
                SELECT prezime INTO prezimeGitar FROM gitaristi WHERE id = ident;
            END;
            ";
        
        $pdo->exec($sql1);
        $pdo->exec($sql2);
        echo "Procedura kreirana <br>";
        
        $sql3 = "CALL get_prezime(:ident, @prezimeGitar)";
        $stmt = $pdo->prepare($sql3);
        $stmt->bindParam(":ident", $id);
        $id = "10";
        $stmt->execute();
        
        $result = $pdo->query("SELECT @prezimeGitar as prezimeGitar");
        foreach($result as $row){
            echo "<br>" . $row['prezimeGitar'] . "<br>";
        }
        $sql4 = "DROP PROCEDURE IF EXISTS spisak_gitarista";
        $sql5 = "CREATE PROCEDURE spisak_gitarista()
         BEGIN
             SELECT * FROM gitaristi;
          END;
          ";
        
          $pdo->exec($sql4);
          $pdo->exec($sql5);
          echo "Procedura kreirana <br>";
        
          $sql6 = "CALL spisak_gitarista()";
          $result = $pdo->query($sql6);
          foreach($result as $row){
            echo "<br>" . $row['id'] . " " . $row['ime'] . " " . $row['prezime'] . " " . $row['prodao_se'] . " " . "<br>";
            }

        





    }catch(PDOException $e){
       // $pdo->rollBack();
        $e->getMessage();
    }

        ?>
    </body>
</html>
        
