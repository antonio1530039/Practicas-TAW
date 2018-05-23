<?php

	//se incluyen los archivos necesarios
	require_once("controller/controller.php");
	require_once("model/enlaces.php");
	require_once("model/crud.php");
	//instancia del controlador
	$controller = new MVC();
	//se ejecuta la funcion showTemplate que incluye la pag template
	$controller->showTemplate();



?>