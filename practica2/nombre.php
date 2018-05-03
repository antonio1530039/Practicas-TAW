<?php
	//Ejercicio 2. Hacer un programa en PHP que escriba vuestro nombre (en negrita) y la ciudad dónde naciste.
	if(isset($_POST["btn"])){
		$nombre = $_POST["nombre"];$ciudad = $_POST["ciudad"];
		echo "<center>
			<strong>$nombre</strong><br>
			<h2>$ciudad</h2>
		";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
	<form name="formulario" method="post">
		<input type="text" name="nombre" placeholder="Ingresa tu nombre">
		<input type="text" name="ciudad" placeholder="Ingresa tu ciudad">
		<input type="submit" name="btn" value="Mostrar">
	</form>
	</center>
</body>
</html>