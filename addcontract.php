<?php include('server.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add Contract</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="header">
			<h2>Dealer Auto - Adaugare contract</h2>
			<br>
            <a class="hbutton" href="index.php"> <img src="images/home.png" style="width: 2%"> </a> 
		</div>

		<form class="registerform" method="post" action="addcontract.php">
			<?php include('errors.php'); ?>
			<div class="input-group">
				<label>Adresa de email a clientului</label>
				<input type="text" name="EmailClient" value="<?php echo $email; ?>">
			</div>
            <div class="input-group">
				<label>Seria de sasiu a masinii cumparate</label>
				<input type="text" name="SerieSasiuContract" value="<?php echo $serie_sasiu; ?>">
			</div>
			<div class="input-group">
				<label>Tip Contract</label>
				<input type="text" name="TipContract" value="<?php echo $tipcontract; ?>">
			<div class="input-group">
				<button type="submit" class="btn" name="add_contract">Confirma contractul</button>
			</div>
		</form>
	</body>
</html>