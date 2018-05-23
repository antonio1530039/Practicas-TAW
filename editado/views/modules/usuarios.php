<?php
	//se verifica si incio sesion el usuario
	$verificar = new MvcController();
	$verificar->verificarUsuarioIngresado();

?>

<center>
	<div class="containter">
	  <div class="col-sm-8">
		<form method="post" class="form-group">
<h1>USUARIOS</h1>

	<table border="1" class="table">
		
		<thead>
			
			<tr>
				<th>Usuario</th>
				<th>Contraseña</th>
				<th>Email</th>
				<th>Editar?</th>
				<th>Eliminar?</th>

			</tr>

		</thead>

		<tbody>
			
			<?php

			$vistaUsuario = new MvcController();
			$vistaUsuario -> vistaUsuariosController();
			$vistaUsuario -> borrarUsuarioController();

			?>

		</tbody>

	</table>
</form>
</div>
</div>
</center>

<?php

if(isset($_GET["action"])){

	if($_GET["action"] == "cambio"){

		echo "Cambio Exitoso";
	
	}

}

?>




