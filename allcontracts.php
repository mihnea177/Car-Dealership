<?php include('server.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Contracts</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
        <div class="header">
			<h2>Dealer Auto - Toate contractele</h2>
            <br>
            <a class="hbutton" href="index.php"> <img src="images/home.png" style="width: 2%"> </a> 
		</div>
        <?php $_SESSION['status'] = "display_contracts"; ?>
        <div class ="lista-masini">
            <?php
                for($i = 1; $i <= $maxval; $i++){
                    $query = "SELECT * FROM Contracte WHERE ContractID=$i";
                    $result = mysqli_query($db, $query);
                    $contract = mysqli_fetch_assoc($result);
                    
                    $id_client = $contract['ClientID'];
                    $id_angajat = $contract['AngajatID'];
                    $id_masina = $contract['MasinaID'];
                    $tip_contract = $contract['TipContract'];
                    
                    $query = "SELECT * FROM Clienti CL, Contracte C WHERE CL.ClientID = C.ClientID AND C.ContractID=$i";
                    $result = mysqli_query($db, $query);
                    $user = mysqli_fetch_assoc($result);
                    $nume = $user['Nume'];
                    $prenume = $user['Prenume'];
                    $info_client = "$nume $prenume";

                    $query = "SELECT * FROM Angajati A, Contracte C WHERE A.AngajatID = C.AngajatID AND C.ContractID=$i";
                    $result = mysqli_query($db, $query);
                    $user = mysqli_fetch_assoc($result);
                    $nume = $user['Nume'];
                    $prenume = $user['Prenume'];
                    $info_angajat = "$nume $prenume";

                    $query = "SELECT * FROM Masini M, Contracte C WHERE M.MasinaID = C.MasinaID AND C.ContractID=$i";
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
                                <p> Cumparator : $info_client </p>
                                <p> Angajat responsabil : $info_angajat </p>
                                <p> Masina  : $info_masina </p>
                                <p> Tipul contractului : $tip_contract </p>
                            </div>
                        </div>
                    ";
                }
            ?>
        </div>
    </body>
</html>