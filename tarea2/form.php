<html>
<head>
    <title>Formulario en PHP7</title>
</head>
<body>
<?php
	include("class_form.php"); //Se incluye el archivo contenedor de la clase a utilizar
	//Inicializar los datos en vacio al cargar la pagina(solo se hace una vez)
	$formu = new xform("","","","","");
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//Se crea un objeto de la clase xform, se ingresan como parametros los datos de los controles, pero antes de ingresarlos al realizar la instancia, se verifica antes si estan inicializados, sino es asi se ingresara un dato vacio. Para ello se ingreso un operador ternario en cada uno de los parametros.
		$formu = new xform(( isset($_POST["name"]) ? $_POST["name"] : ""),
			(isset($_POST["email"]) ? $_POST["email"] : ""),
			(isset($_POST["gender"]) ? $_POST["gender"] : ""), 
			(isset($_POST["comment"]) ? $_POST["comment"] : ""), 
			(isset($_POST["website"]) ? $_POST["website"] : ""));
		//Ejecucion del metodo validateAll
		$formu->validateAll();
	}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Name: <input type="text" name="name" value="<?php echo $formu->name;?>">
    <span class="error">* <?php echo $formu->nameErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email" value="<?php echo $formu->email;?>">
    <span class="error">* <?php echo $formu->emailErr;?></span>
    <br><br>
    Website: <input type="text" name="website" value="<?php echo $formu->website;?>">
    <span class="error"><?php echo $formu->websiteErr;?></span>
    <br><br>
    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $formu->comment;?></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" <?php if (isset($formu->gender) && $formu->gender=="female") echo "checked";?> value="female">Female
    <input type="radio" name="gender" <?php if (isset($formu->gender) && $formu->gender=="male") echo "checked";?> value="male">Male
    <span class="error">* <?php echo $formu->genderErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
	//Ejecucion del metodo printInput
	$formu->printInput();
?>

<ul>
    <li><a href="#">Volver al Inicio</a></li>
</ul>
</body>
</html>
