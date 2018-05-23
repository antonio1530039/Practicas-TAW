<?php

class Conexion{

	public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=practica9","root","");
		return $link;
	}


}



?>