<!-- Registro de producto -->
<center>
	<div class="containter">
	  <div class="col-sm-8">
		<form method="post" class="form-group">

<h1>REGISTRO DE PRODUCTOS</h1>
	
	<input type="text" placeholder="Nombre de producto" name="nombre" required class="form-control">

	<input type="text" placeholder="Descripcion" name="des" required class="form-control">
	<input type="number" placeholder="Precio de compra" name="buy" required class="form-control">
		<input type="number" placeholder="Precio de venta" name="sale" required class="form-control">

	<input type="number" placeholder="Precio" name="price" required class="form-control">
	<br>
	<input type="submit" value="Registrar" name="registroProducto" class="btn btn-success">

</form>

</div>
</div>
</center>
<?php
//Enviar los datos al controlador MvcController (es la clase principal de controller.php)
$registro = new MvcController();
//se verifica si inicio sesion el usuario
$registro->verificarUsuarioIngresado();

//Se crea la instancia de la clase controlador de productos
$registro_producto = new MvcProductos();
//se invoca la función registroProductosController de la clase MvcController cuando el usuario da clic en el boton registrar para realizar el proceso de registro
$registro_producto -> registroProductosController();

?>
