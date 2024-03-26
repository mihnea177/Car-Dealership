<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
  		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		unset($_SESSION['type']);
  		header("location: login.php");
 	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Dealer auto</h2>
</div>

<div class="content">

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

    <?php  if (isset($_SESSION['username'])) : ?>
    	<p> Bine ai venit, <?php echo $_SESSION['type'];?> <strong> <?php echo $_SESSION['username']; ?> </strong> <a href="index.php?logout='1'" style="color: red;">Deconecteaza-te</a> </p>
    <?php endif ?>
	
	<?php if ($_SESSION['type'] == "[Client]") : ?>
		<div>
			<button class='menu' type='text'> <a href='cars.php' style='text-decoration: none; color: white'>Vezi masinile disponibile </a> </button>
			<button class='menu' type='text'> <a href='yourcontracts.php' style='text-decoration: none; color: white'>Vezi achizitiile tale </a> </button>
			<button class='menu' type='text'> <a href='changepass.php' style='text-decoration: none; color: white'>Schimba-ti parola </a> </button>
		</div>
	<?php endif ?>

	<?php if ($_SESSION['type'] == "[Angajat]") : ?>
		<div>
			<button class='menu' type='text'> <a href='cars.php' style='text-decoration: none; color: white'>Vezi masinile disponibile </a> </button>
			<button class='menu' type='text'> <a href='addcar.php' style='text-decoration: none; color: white'>Adauga o masina </a> </button>
			<button class='menu' type='text'> <a href='allcontracts.php' style='text-decoration: none; color: white'>Vezi toate contractele </a> </button>
			<button class='menu' type='text'> <a href='addcontract.php' style='text-decoration: none; color: white'>Adauga un contract </a> </button>
			<button class='menu' type='text'> <a href='changepass.php' style='text-decoration: none; color: white'>Schimba-ti parola </a> </button>
		</div>
	<?php endif ?>

	<?php if ($_SESSION['type'] == "[ADMIN]") : ?>
		<div>
			<button class='menu' type='text'> <a href='cars.php' style='text-decoration: none; color: white'>Vezi masinile disponibile </a> </button>
			<button class='menu' type='text'> <a href='addcar.php' style='text-decoration: none; color: white'>Adauga o masina </a> </button>
			<button class='menu' type='text'> <a href='allcontracts.php' style='text-decoration: none; color: white'>Vezi toate contractele </a> </button>
			<button class='menu' type='text'> <a href='addcontract.php' style='text-decoration: none; color: white'>Adauga un contract </a> </button>
			<button class='menu' type='text'> <a href='addemployee.php' style='text-decoration: none; color: white'>Adauga un angajat </a> </button>
			<button class='menu' type='text'> <a href='changepass.php' style='text-decoration: none; color: white'>Schimba-ti parola </a> </button>
		</div>
	<?php endif ?>
</div>

</body>
</html>