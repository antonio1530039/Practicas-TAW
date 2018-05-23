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
	//se crea la instancia del controlador
	$editarProducto = new MvcProductos();
	//se ejecutan los metodos de editarProducto para obtener os datos de este
	$editarProducto -> editarProductoController();
	//se ejecuta el metodo actualizar producto en caso de que le usuario le de clic en actualizar
	$editarProducto -> actualizarProductoController();

	?>

</form>
</div>
</div>
</center>



