<?php
	//se verifica si incio sesion el usuario
	$verificar = new MvcController();
	$verificar->verificarUsuarioIngresado();

?>
<!-- GEstion de usuarios -->
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
			//se crea una instancia de la clase controlador
			$vistaUsuario = new MvcController();
			//se muestra el contenido de la tabla usuarios
			$vistaUsuario -> vistaUsuariosController();
			//se ejecuta la funcion borrar usuario en caso de que el usuario presione el boton de borrar
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




