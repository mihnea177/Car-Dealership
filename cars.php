<?php include('server.php') ?>
<!DOCTYPE html>
<html>
    <head>
	    <title>Masini disponibile</title>
	    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header">
            <h2 class="htext">Dealer Auto - Masini disponibile</h2>
            <br>
            <a class="hbutton" href="index.php"> <img src="images/home.png" style="width: 2%"> </a> 
        </div>

        <?php $_SESSION['status'] = "display_cars"; ?>

        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php 
                    echo $_SESSION['success']; 
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <div class="lista-masini">
            <?php
            for($i = 1; $i <= $maxval; $i++){
                $query = "SELECT * FROM Masini WHERE MasinaID=$i";
                $result = mysqli_query($db, $query);
                $car = mysqli_fetch_assoc($result);

                $serie_sasiu = $car['NrSasiu'];
                $marca = $car['Marca'];
                $model = $car['Model'];
                $culoare = $car['Culoare'];
                $an_fabricatie= $car['AnFabricatie'];
                $poza = $car['Poza'];
                $disponibilitate = $car['Disponibilitate'];
                
                $query = 
                    "SELECT NumeClasa
                    FROM Clase
                    WHERE ClasaID IN (
                        SELECT ClasaID
                        FROM Masini
                        WHERE MasinaID = $i
                    );
                ";
                $result = mysqli_query($db, $query);
                $car = mysqli_fetch_assoc($result);
                $clasa = $car['NumeClasa'];
                if($disponibilitate == 0){
                    echo "
                        <div class='box'>
                            <div class='image'>
                                <img src='images/$poza'>
                            </div>
                            <div class='text'>
                                <p> Serie de sasiu : $serie_sasiu </p>
                                <p> Marca : $marca </p>
                                <p> Model : $model </p>
                                <p> Culoare : $culoare </p>
                                <p> An de fabricatie : $an_fabricatie </p>
                                <p> Clasa : $clasa </p>
                            </div>
                            <div class='text'>
                                <p> Dotari : </p>
                    ";

                    $query = 
                        "SELECT NumeDotare, DescriereDotare
                        FROM Dotari
                        WHERE DotareID IN (
                            SELECT DotareID
                            FROM Masini_Dotari
                            WHERE MasinaID = $i
                        );
                    ";
                    $result = mysqli_query($db, $query);
                    if($result){
                        while($car = mysqli_fetch_assoc($result)){
                            $dotare = $car['NumeDotare'];
                            $descriere_dotare = $car['DescriereDotare'];
                            echo "
                                <div class='dropdown'>
                                    <p> --$dotare </p>
                                    <div class='dropdown_content'>
                                        <p> $descriere_dotare </p>
                                    </div>
                                </div>
                            ";
                        }
                    }else{
                        echo "<p>-</p>";
                    }
                    echo"
                            </div>
                        </div>
                    ";
                }
            }
            ?>
        </div>
    </body>
</html>