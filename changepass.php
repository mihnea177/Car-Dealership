<?php include('server.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Change Password</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="header">
			<h2>Dealer Auto - Schimba-ti parola</h2>
			<br>
            <a class="hbutton" href="index.php"> <img src="images/home.png" style="width: 2%"> </a> 
		</div>

		<form class="registerform" method="post" action="changepass.php">
			<?php include('errors.php'); ?>
			<div class="input-group">
				<label>Parola veche</label>
				<input type="text" name="OldPass" value="<?php echo $oldpass; ?>">
			</div>
            <div class="input-group">
				<label>Parola noua</label>
				<input type="text" name="NewPass1" value="<?php echo $password_1; ?>">
			</div>
			<div class="input-group">
				<label>Repeta parola noua</label>
				<input type="text" name="NewPass2" value="<?php echo $password_2; ?>">
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="change_pass">Confirma schimbarea parolei</button>
			</div>
		</form>
	</body>
</html>