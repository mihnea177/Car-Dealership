<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Employee</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Dealer Auto - Inregistrare Angajat</h2>
		<br>
        <a class="hbutton" href="index.php"> <img src="images/home.png" style="width: 2%"> </a>
	</div>
	
	<form class="registerform" method="post" action="addemployee.php">
  		<?php include('errors.php'); ?>
  		<div class="input-group">
  	  		<label>Nume</label>
  	  		<input type="text" name="Nume" value="<?php echo $nume; ?>">
  		</div>
		<div class="input-group">
  	  		<label>Prenume</label>
  	  		<input type="text" name="Prenume" value="<?php echo $prenume; ?>">
  		</div>
		<div class="input-group">
  	  		<label>Numar de telefon</label>
  	 		<input type="text" name="nrtlf" value="<?php echo $nr_tel; ?>">
  		</div>
  		<div class="input-group">
  	  		<label>Email</label>
  	  		<input type="email" name="email" value="<?php echo $email; ?>">
  		</div>
  		<div class="input-group">
  	  		<label>Parola</label>
  	 		<input type="password" name="password_1" value="<?php echo $password_1; ?>">
  		</div>
  		<div class="input-group">
  	  		<label>Confirmare parola</label>
  	  		<input type="password" name="password_2" value="<?php echo $password_2; ?>">
  		</div>
  		<div class="input-group">
  	  		<button type="submit" class="btn" name="reg_employee">Inregistreaza-te</button>
  		</div>
	</form>
</body>
</html>