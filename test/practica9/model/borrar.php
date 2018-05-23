<?php

	require_once("model/crud.php");
	require_once("controller/controller.php");

	$controller = new MVC();

	$pos="id";

	$controller->borrarController($_GET[$pos],$_GET['tipo']);

?>