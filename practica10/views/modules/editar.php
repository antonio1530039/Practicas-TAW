<?php

//se verifica si incio sesion el usuario
	$verificar = new MvcController();
	$verificar->verificarUsuarioIngresado();

?>
<center>
	<div class="containter">
	  <div class="col-sm-8">
		<form method="post" class="form-group">
<h1>EDITAR USUARIO</h1>

	
	<?php
	//se crea otra instancia de la clase controlador
	$editarUsuario = new MvcController();
	//se traen los datos del usuario seleccionado
	$editarUsuario -> editarUsuarioController();
	//se ejecuta la funcion de actualizar en caso de que el usuario de clic en el boton
	$editarUsuario -> actualizarUsuarioController();

	?>

</form>

</div>
</div>
</center>



