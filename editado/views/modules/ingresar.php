

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

$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Fallo al ingresar";
	
	}

}

?>