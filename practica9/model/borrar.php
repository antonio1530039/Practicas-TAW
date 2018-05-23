<?php

	require_once("model/crud.php");
	require_once("controller/controller.php");

	$controller = new MVC();

	$pos="id";

	//ejecutar funcion de borrado
	$controller->borrarController($_GET[$pos],$_GET['tipo']);

?>