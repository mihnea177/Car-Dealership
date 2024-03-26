<?php
session_start();

// vectorul in care vor aparea erorile
$errors     = array();

// variabile pentru lucrul cu datele persoanelor
$nume       = "";
$prenume    = "";
$nr_tel     = "";
$email      = "";
$password_1 = "";
$password_2 = "";
$errors     = array();

// variabile pentru lucrul cu datele masinilor
$serie_sasiu      = "";
$marca         = "";
$model         = "";
$clasa         = "";
$culoare       = "";
$an_fabricatie = "";
$poza          = "";
$dotare        = "";

// conectarea la baza de date
$db = mysqli_connect('localhost', 'root', '', 'ProiectBD');



// REGISTER CLIENT
if (isset($_POST['reg_user'])) {
  
  // preluare date din form
  $nume = mysqli_real_escape_string($db, $_POST['Nume']);
  $prenume = mysqli_real_escape_string($db, $_POST['Prenume']);
  $nr_tel = mysqli_real_escape_string($db, $_POST['nrtlf']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // verificare erori
  if (empty($nume)) { array_push($errors, "Numele este necesar"); }
  if (empty($prenume)) { array_push($errors,"Prenumele este necesar"); }
  if (empty($nr_tel)) { array_push($errors,"Numarul de telefon este necesar"); }
  if (empty($email)) { array_push($errors, "E-mail-ul este necesar"); }
  if (empty($password_1)) { array_push($errors, "Parola este necesara"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Cele doua parole nu sunt identice");
  }
  $query = "SELECT * FROM Clienti WHERE Email='$email' LIMIT 1";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);
  if ($user) {
    if ($user['Email'] === $email) {
      array_push($errors, "Deja exista un cont cu acest email");
    }
  }

  // introducere in baza de date si redirectionare
  if (count($errors) == 0) {
  	//$password_1 = md5($password_);
  	$query = "INSERT INTO Clienti (Email, Parola, Nume, Prenume, NrTelefon) 
  			  VALUES('$email', '$password_1', '$nume', '$prenume', '$nr_tel')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = "$nume $prenume";
  	$_SESSION['success'] = "Autentificat cu succes";
    $_SESSION['email'] = "$email";
    $_SESSION['type'] = "[Client]";
  	header('location: index.php');
  }
}

// REGISTER ANGAJAT - ADMIN ONLY
if (isset($_POST['reg_employee'])) {
  
  // preluare date din form
  $nume = mysqli_real_escape_string($db, $_POST['Nume']);
  $prenume = mysqli_real_escape_string($db, $_POST['Prenume']);
  $nr_tel = mysqli_real_escape_string($db, $_POST['nrtlf']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // verificare erori
  if (empty($nume)) { array_push($errors, "Numele este necesar"); }
  if (empty($prenume)) { array_push($errors,"Prenumele este necesar"); }
  if (empty($nr_tel)) { array_push($errors,"Numarul de telefon este necesar"); }
  if (empty($email)) { array_push($errors, "E-mail-ul este necesar"); }
  if (empty($password_1)) { array_push($errors, "Parola este necesara"); }
  if ($password_1 != $password_2) {
	array_push($errors, "Cele doua parole nu sunt identice");
  }
  $query = "SELECT * FROM Angajati WHERE Email='$email' LIMIT 1";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);
  if ($user) {
    if ($user['Email'] === $email) {
      array_push($errors, "Deja exista un cont de angajat cu acest email");
    }
  }

  // introducere in baza de date si redirectionare
  if (count($errors) == 0) {
  	//$password_1 = md5($password_);
  	$query = "INSERT INTO Angajati (Email, Parola, Nume, Prenume, NrTelefon) 
  			  VALUES('$email', '$password_1', '$nume', '$prenume', '$nr_tel')";
  	mysqli_query($db, $query);
  	header('location: index.php');
  }
}

// LOGIN
if (isset($_POST['login_user'])) {

  // preluare date din form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['parola']);

  // verificare erori
  if (empty($email)) {
  	array_push($errors, "Introdu email-ul");
  }
  if (empty($password_1)) {
  	array_push($errors, "Introdu parola");
  }

  // introducere in baza de date si redirectionare

  // verificare in baza clientilor
  if (count($errors) == 0) {
  	//$password = md5($password);
  	$query = "SELECT Nume, Prenume FROM Clienti WHERE Email='$email' AND Parola='$password_1'";
  	$results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);
    $nume = $user['Nume'];
    $prenume = $user['Prenume'];
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = "$nume $prenume";
      $_SESSION['email'] = "$email";
  	  $_SESSION['success'] = "Autentificare reusita ";
      $_SESSION['type'] = "[Client]";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Email sau parola gresite");
  	}
  }
  
  // verificare in baza angajatilor
  if (count($errors) == 1) {
  	//$password = md5($password);
  	$query = "SELECT Nume, Prenume FROM Angajati WHERE Email='$email' AND Parola='$password_1'";
  	$results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);
    $nume = $user['Nume'];
    $prenume = $user['Prenume'];
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = "$nume $prenume";
  	  $_SESSION['success'] = "Autentificare reusita ";
      $_SESSION['email'] = "$email";
      $_SESSION['type'] = "[Angajat]";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Email sau parola gresite");
  	}
  }

  // verificare in baza administratorilor
  if (count($errors) == 2) {
  	//$password = md5($password);
  	$query = "SELECT Nume, Prenume FROM Admins WHERE Email='$email' AND Parola='$password_1'";
  	$results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);
    $nume = $user['Nume'];
    $prenume = $user['Prenume'];
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = "$nume $prenume";
  	  $_SESSION['success'] = "Autentificare reusita ";
      $_SESSION['email'] = "$email";
      $_SESSION['type'] = "[ADMIN]";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Email sau parola gresite");
  	}
  }

}

// DISPLAY CAR LIST
if($_SESSION['status'] == "display_cars") {
  $query = "SELECT * FROM Masini ORDER BY MasinaID DESC LIMIT 1";
  $result = mysqli_query($db, $query);
  $car = mysqli_fetch_assoc($result);
  $maxval = $car['MasinaID'];
}

// DISPLAY CONTRACT LIST
if($_SESSION['status'] == "display_contracts"){
  $query = "SELECT * FROM Contracte ORDER BY ContractID DESC LIMIT 1";
  $result = mysqli_query($db, $query);
  $contract = mysqli_fetch_assoc($result);
  $maxval = $contract['ContractID'];
}

// ADDCAR
if (isset($_POST['add_car1'])) {
  
  // preluare date din form
  $serie_sasiu = mysqli_real_escape_string($db, $_POST['SerieSasiu']);
  $marca = mysqli_real_escape_string($db, $_POST['Marca']);
  $model = mysqli_real_escape_string($db, $_POST['Model']);
  $clasa = mysqli_real_escape_string($db, $_POST['Clasa']);
  $culoare = mysqli_real_escape_string($db, $_POST['Culoare']);
  $an_fabricatie = mysqli_real_escape_string($db, $_POST['AnFabricatie']);
  $poza = mysqli_real_escape_string($db, $_POST['Poza']);
  
  // verificare erori
  if (empty($serie_sasiu)) { array_push($errors, "Nu ai introdus seria de sasiu"); }
  if (empty($marca)) { array_push($errors,"Nu ai introdus marca"); }
  if (empty($model)) { array_push($errors,"Nu ai introdus modelul"); }
  if (empty($clasa)) { array_push($errors, "Nu ai introdus clasa"); }
  if (empty($culoare)) { array_push($errors, "Nu ai introdus culoarea"); }
  if (empty($an_fabricatie)) { array_push($errors, "Nu ai introdus anul de fabricatie"); }
  if (empty($poza)) { array_push($errors, "Nu ai introdus o imagine"); }
  $query = "SELECT * FROM Masini WHERE NrSasiu='$serie_sasiu' LIMIT 1";
  $result = mysqli_query($db, $query);
  $car = mysqli_fetch_assoc($result);
  if ($car) {
    if ($car['NrSasiu'] === $serie_sasiu) {
      array_push($errors, "Deja exista un vehicul cu aceasta serie de sasiu");
    }
  }
  
  // redirectionare
  if (count($errors) == 0) {
  	//$password_1 = md5($password_);
  	$query = "INSERT INTO Masini (NrSasiu, Marca, Model, Clasa, Culoare, AnFabricatie, Poza) 
  			  VALUES('$serie_sasiu', '$marca', '$model', '$clasa', '$culoare', '$an_fabricatie', '$poza')";
  	mysqli_query($db, $query);

    $query = "SELECT * FROM Masini ORDER BY MasinaID DESC LIMIT 1";
    $result = mysqli_query($db, $query);
    $car = mysqli_fetch_assoc($result);
    $id_masina = $car['MasinaID'];

    $valori = $_POST['valori'];
    if (!empty($valori)) {

      // Parcurgem array-ul de valori și le inserăm în baza de date
      foreach ($valori as $valoare) {
          $query = "INSERT INTO Masini_Dotari (MasinaID, DotareID) VALUES ('$id_masina', '$valoare')";
          if (mysqli_query($db, $query)) {
            array_push($errors, "Nu au putut fi introduse dotarile");
          }
      }
    }

  	$_SESSION['success'] = "Masina a fost incarcata cu succes";
  	header('location: cars.php');
  }

}

// ADDCONTRACT

$tipcontract = "";
$id_masina = "";
$id_client = "";
$id_seller = "";

if (isset($_POST['add_contract'])) {
  
  // preluare date din form
  $email = mysqli_real_escape_string($db, $_POST['EmailClient']);
  $serie_sasiu = mysqli_real_escape_string($db, $_POST['SerieSasiuContract']);
  $tipcontract = mysqli_real_escape_string($db, $_POST['TipContract']);

  // verificare erori
  if (empty($email)) { array_push($errors, "Nu ai introdus email-ul clientului"); }
  if (empty($serie_sasiu)) { array_push($errors,"Nu ai introdus masina pentru care se face contractul"); }
  if (empty($tipcontract)) { array_push($errors,"Nu ai introdus tipul de contract care se va realiza"); }

  
  // preluare id - masina
  $query = "SELECT MasinaID FROM Masini WHERE NrSasiu='$serie_sasiu' LIMIT 1";
  $result = mysqli_query($db, $query);
  $car = mysqli_fetch_assoc($result);
  if(empty($car)){
    array_push($errors,"Nu exista aceasta masina");
  }else{
    $id_masina = $car['MasinaID'];
  }
  
  //preluare id - client
  $query = "SELECT ClientID FROM Clienti WHERE Email='$email' LIMIT 1";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);
  if(empty($user)){
    array_push($errors, "Nu exista clientul pe care l-ai introdus");
  }else{
    $id_client = $user['ClientID'];
  }

  //preluare id - angajat
  
  if($_SESSION['type'] == '[Angajat]'){
    $email = $_SESSION['email'];
    $query = "SELECT AngajatID FROM Angajati WHERE Email='$email' LIMIT 1";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    $id_seller = $user['AngajatID'];
  }
  if($_SESSION['type'] == '[ADMIN]'){
    $email = $_SESSION['email'];
    $query = "SELECT AdminID FROM Admins WHERE Email='$email' LIMIT 1";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);
    $id_seller = $user['AdminID'];
  }
  //introducere in baza de date
  if (count($errors) == 0) {
    //introducerea datelor
  	$query = 
    "INSERT INTO Contracte (ClientID, AngajatID, MasinaID, TipContract)
    VALUES ('$id_client', '$id_seller', '$id_masina', '$tipcontract')
    ";
    if(mysqli_query($db, $query)){
      $query = 
      "UPDATE Masini
      SET Disponibilitate = 1
      WHERE MasinaID= '$id_masina'
      ";
      if(mysqli_query($db, $query)){
        $_SESSION['success'] = "Inserare si modificare cu succes";
        header('location: index.php');
      }
    }
  }
}

// CHANGE PASSWORD

if (isset($_POST['change_pass'])) {
  
  // preluare date din form
  $oldpass = mysqli_real_escape_string($db, $_POST['OldPass']);
  $password_1 = mysqli_real_escape_string($db, $_POST['NewPass1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['NewPass2']);

  // verificare erori
  if (empty($oldpass)) { array_push($errors, "Nu ai introdus parola veche"); }
  if (empty($password_1)) { array_push($errors,"Nu ai introdus o noua parola"); }
  if (empty($password_2)) { array_push($errors,"Nu ai introdus o noua parola"); }

  if($password_1 != $password_2){
    array_push($errors,"Parolele nu coincid");
  }

  $stype = $_SESSION['type'];
  if($stype == '[ADMIN]'){
    $stype = 'Admins';
  }
  if($stype == '[Angajat]'){
    $stype = 'Angajati';
  }
  if($stype == '[Client]'){
    $stype = 'Clienti';
  }

  $query = "SELECT Parola FROM $stype WHERE Email='{$_SESSION['email']}'";
  $results = mysqli_query($db, $query);
  $parola_veche_existenta = mysqli_fetch_assoc($results);
  $parola_veche_existenta = $parola_veche_existenta['Parola'];

  if($parola_veche_existenta != $oldpass){
    array_push($errors,"Parola veche nu coincide cu cea existenta");
  }

  if($password_1 == $oldpass){
    array_push($errors,"Nu poti schimba parola cu cea existenta");
  }


  if (count($errors) == 0) {
  	$query = 
      "UPDATE $stype
      SET Parola = '$password_1'
      WHERE Email= '{$_SESSION['email']}'
    ";
    if(mysqli_query($db, $query)){
    $_SESSION['success'] = "Parola a fost actualizata cu succes";
    header('location: index.php');
    }
  }

}


?>