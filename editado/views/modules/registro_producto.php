<center>
	<div class="containter">
	  <div class="col-sm-8">
		<form method="post" class="form-group">

<h1>REGISTRO DE PRODUCTOS</h1>
	
	<input type="text" placeholder="Product" name="nombre" required class="form-control">

	<input type="text" placeholder="Description" name="des" required class="form-control">
	<input type="text" placeholder="Buy price" name="buy" required class="form-control">
		<input type="text" placeholder="Sale price" name="sale" required class="form-control">

	<input type="text" placeholder="Price" name="price" required class="form-control">
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


$registro_producto = new MvcProductos();
//se invoca la función registroProductosController de la clase MvcController:
$registro_producto -> registroProductosController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
