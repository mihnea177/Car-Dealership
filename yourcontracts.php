<?php include('server.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Your Contracts</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
        <div class="header">
			<h2 class="htext">Dealer Auto - Contractele Tale</h2>
            <br>
            <a class="hbutton" href="index.php"> <img src="images/home.png" style="width: 2%"> </a> 
		</div>
        <?php $_SESSION['status'] = "display_contracts"; ?>
        <div class ="lista-masini">
            <?php
                $query = "SELECT * FROM Clienti WHERE Email='{$_SESSION['email']}'";
                $result = mysqli_query($db, $query);
                $user = mysqli_fetch_assoc($result);
                $id_client = $user['ClientID'];
                $nr_contracte = 0;

                for($i = 1; $i <= $maxval; $i++){

                    $query = "SELECT * FROM Contracte WHERE ContractID=$i AND ClientID=$id_client";
                    $result = mysqli_query($db, $query);
                    $contract = mysqli_fetch_assoc($result);

                    if($contract){
                        $nr_contracte = $nr_contracte + 1;
                        $id_angajat = $contract['AngajatID'];
                        $id_masina = $contract['MasinaID'];
                        $tip_contract = $contract['TipContract'];
                        

                        $query = 
                            "SELECT *
                            FROM Angajati A
                            JOIN Contracte C ON A.AngajatID = C.AngajatID
                            WHERE C.ContractID = $i
                            ";
                        $result = mysqli_query($db, $query);
                        $user = mysqli_fetch_assoc($result);
                        $nume = $user['Nume'];
                        $prenume = $user['Prenume'];
                        $info_angajat = "$nume $prenume";

                        $query = 
                            "SELECT *
                            FROM Masini M
                            JOIN Contracte C ON M.MasinaID = C.MasinaID
                            WHERE C.ContractID = $i
                            ";
                        $result = mysqli_query($db, $query);
                        $car = mysqli_fetch_assoc($result);
                        $serie_sasiu = $car['NrSasiu'];
                        $marca = $car['Marca'];
                        $model = $car['Model'];
                        $poza = $car['Poza'];
                        $info_masina = "$marca $model; $serie_sasiu";

                        echo "
                            <div class='box'>
                                <div class='image'>
                                    <img src='images/$poza'>
                                </div>
                                <div class='text'>
                                    <p> Angajat responsabil : $info_angajat </p>
                                    <p> Masina  : $info_masina </p>
                                    <p> Tipul contractului : $tip_contract </p>
                                </div>
                            </div>
                        ";
                    }
                }
                if($nr_contracte == 0){
                    echo "
                        <div class='box'>
                            <div class='text'>
                                <p> Nu ai nici un contract </p>
                            </div>
                        </div>
                    ";
                }
            ?>
        </div>
    </body>
</html>