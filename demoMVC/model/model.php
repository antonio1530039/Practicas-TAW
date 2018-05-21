<?php

class Model{
	//Funcion que dado un valor de action se retorna un enlace a mostrar
	public function enlacePaginasModel($enlace){
		//Se verifica si enlace es nosotros, inicio u hola, si es asi se retorna la pagina solicitada, sino retorna a inicio
		return ($enlace == "nosotros" || 
				$enlace == "inicio" || 
				$enlace == "hola") ? "view/$enlace.php" : "view/inicio.php";
	}

}



?>