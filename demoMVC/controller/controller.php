<?php

class MVController{

	//Funcion que muestra template.php mediante include
	public function showTemplate(){

		include "view/template.php";
	}
	//Funcion que realiza la peticion de enlace al modelo
	public function enlacePaginasController(){

		$enlace = (!isset($_GET['action'])) ? "inicio" : $_GET['action']; //verifica si esta definida la variable action mediante el metodo get, si es asi la guarda en $enlace, sino se guarda inicio

		$peticion = Model::enlacePaginasModel($enlace); //se realiza la peticion mandando como parametro lo cachado por la variable action (se retorna un enlace)

		include $peticion; //se muestra la respuesta del modelo

	}


}



?>