<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
  		<h2> Dealer Auto - Autentificare </h2>
  	</div>
	 
	<form class="loginform" method="post" action="login.php">
  		<?php include('errors.php'); ?>
  		<div class="input-group">
  			<label>E-mail</label>
  			<input type="text" name="email" value="<?php echo $email; ?>" >
  		</div>
  		<div class="input-group">
  			<label>Parola</label>
  			<input type="password" name="parola" value="<?php echo $password_1; ?>">
  		</div>
  		<div class="input-group">
  			<button type="submit" class="btn" name="login_user">Autentificare</button>
  		</div>
  		<p>
  			Nu ai cont? <a href="register.php">Inregistreaza-te</a>
  		</p>
  	</form>
</body>
</html>