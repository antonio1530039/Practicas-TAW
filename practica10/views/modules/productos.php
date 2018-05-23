<?php
	//se verifica si incio sesion el usuario
	$verificar = new MvcController();
	$verificar->verificarUsuarioIngresado();

?>
<!-- Gestion de productos -->
<center>
	<div class="containter">
	  <div class="col-sm-8">
		<form method="post" class="form-group">
<h1>PRODUCTOS</h1>
	<input type="button" class="btn btn-success" onclick="window.location='index.php?action=registro_producto'" value="Registrar" style="float:right">
		<br><br>
	<table border="1" class="table">
		
		<thead>
			
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Precio compra</th>
				<th>Precio venta</th>
				<th>Precio</th>
				<th>Editar?</th>
				<th>Eliminar?</th>

			</tr>

		</thead>

		<tbody>
			
			<?php
			//se crea la instancia del controlador
			$vistaProductos = new MvcProductos();
			//se muestra el contenido de la tabla prdoductos
			$vistaProductos -> vistaProductosController();
			//se ejecuta el metodo en caso de que el usuario de clic en el boton borrar para borrar el producto seleccionado
			$vistaProductos -> borrarProductoController();

			?>

		</tbody>

	</table>
</form>
</div>
</div>
</center>

<script type="text/javascript">
	//funcion para confirmar si se desea borrar el registro
	function conf(){
		var x = confirm("Seguro que deseas borrar el registro");
		if(!x){
			event.preventDefault(); //en caso de dar clic en cancelar, no se continua la operacion
		}
	}
</script>



