<?php

//Clase conexion encargada de conectar la base de datos con la aplicacion web
class Conexion{
	//funcion que conecta con los paremtros especificados a la base de datos
	public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=curso_php","root","");
		return $link;

	}

}
?>
