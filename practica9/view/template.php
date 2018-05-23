<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php //se incluye el nav o el menu 
	include "view/header.php"; ?>
	<hr>
	<section>
	<?php
	//se hace la instancia del controlador
	$controllerT = new MVC();
	//se ejecuta la funcion enlacePaginasControlller para redireccionar la pag correspondiente
	$controllerT->enlacePaginasController();
	?>
	</section>
	<?php //se incluye el footer
	include "view/footer.php"; ?>
</body>
</html>