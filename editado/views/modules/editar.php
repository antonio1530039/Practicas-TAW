<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");

	exit();

}

?>
<center>
	<div class="containter">
	  <div class="col-sm-8">
		<form method="post" class="form-group">
<h1>EDITAR USUARIO</h1>

	
	<?php

	$editarUsuario = new MvcController();
	$editarUsuario -> editarUsuarioController();
	$editarUsuario -> actualizarUsuarioController();

	?>

</form>

</div>
</div>
</center>



