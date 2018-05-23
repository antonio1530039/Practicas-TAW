
<center>
	<div class="containter">
	  <div class="col-sm-8">
		<form method="post" class="form-group">
<h1>REGISTRO DE USUARIO</h1>
	
	<input type="text" placeholder="Usuario" name="usuarioRegistro" required class="form-control">

	<input type="password" placeholder="Contraseña" name="passwordRegistro" required class="form-control">

	<input type="email" placeholder="Email" name="emailRegistro" required class="form-control">
	<br>
	<input type="submit" value="Enviar" class="btn btn-success">

</form>
</div>
</div>
</center>

<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se invoca la función registroUsuarioController de la clase MvcController:
$registro -> registroUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
