<!-- Login -->
	<center>
	<div class="containter">
	  <div class="col-sm-4">
		<form method="post" class="form-group">
			<h1>INGRESAR</h1>
			
			<input type="text" placeholder="Usuario" name="usuarioIngreso" class="form-control" required>

			<input type="password" placeholder="Contraseña" class="form-control" name="passwordIngreso" required>
			<br>
			<input type="submit" value="Enviar" class="btn btn-success">

		</form>
		</div>
	</div>
</center>

<?php
//se crea la instancia de la clase controlador
$ingreso = new MvcController();
//se ejecuta la funcion cuando el usuario de clic en el boton enviar
$ingreso -> ingresoUsuarioController();
//se verifica si ocurrio un falo al iniciar se imprime Fallo al ingresar
if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>