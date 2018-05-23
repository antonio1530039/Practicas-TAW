<?php

class Conexion{
	//Funcion que realiza la conexion por PDO
	public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=practica9","root","");
		return $link;
	}


}



?>