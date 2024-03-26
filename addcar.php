<?php include('server.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add Car</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="header">
			<h2>Dealer Auto - Adaugare masina in baza de date</h2>
			<br>
            <a class="hbutton" href="index.php"> <img src="images/home.png" style="width: 2%"> </a> 
		</div>

		<form class="registerform" method="post" action="addcar.php">
			<?php include('errors.php'); ?>
			<div class="input-group">
				<label>Serie de sasiu</label>
				<input type="text" name="SerieSasiu" value="<?php echo $serie_sasiu; ?>">
			</div>
			<div class="input-group">
				<label>Marca</label>
				<input type="text" name="Marca" value="<?php echo $marca; ?>">
			</div>
			<div class="input-group">
				<label>Model</label>
				<input type="text" name="Model" value="<?php echo $model; ?>">
			</div>
			<div class="input-group-radio">
				<label>Clasa</label><br>
				<input type="radio" id="sedan" name="Clasa" value="<?php echo $clasa=1; ?>">
				<label for="sedan">Sedan</label><br>
				<input type="radio" id="SUV" name="Clasa" value="<?php echo $clasa=2; ?>">
				<label for="SUV">SUV</label><br>
				<input type="radio" id="Hatchback" name="Clasa" value="<?php echo $clasa=3; ?>">
				<label for="Hatchback">Hatchback</label><br>
				<input type="radio" id="Coupe" name="Clasa" value="<?php echo $clasa=4; ?>">
				<label for="Coupe">Coupe</label><br>
			</div>
			<div class="input-group">
				<label>Culoare</label>
				<input type="text" name="Culoare" value="<?php echo $culoare; ?>">
			</div>
			<div class="input-group">
				<label>An de fabricatie</label>
				<input type="text" name="AnFabricatie" value="<?php echo $an_fabricatie; ?>">
			</div>
			<div class="input-group">
				<label>Introdu o imagine</label>
				<input type="file" name="Poza" value="<?php echo $poza; ?>">
			</div>
			<div class="input-group-radio">
				<label for="valori">Selectează dotarile (ține apăsată tasta 'Ctrl' pentru selecție multiplă):</label> <br>
				<select name="valori[]" id="valori" multiple>
					<option value="1">Lumini</option>
					<option value="2">Climatizare</option>
					<option value="3">Infotainment</option>
					<option value="4">Stergatoare</option>
				</select>
				<br>
			</div>

			<div class="input-group">
				<button type="submit" class="btn" name="add_car1">Pasul urmator</button>
			</div>
			
		</form>
	</body>
</html>