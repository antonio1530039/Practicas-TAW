<?php 
//clase encargada de realizar el redireccionamiento de las paginas en base a la variable action en el metodo get
class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "usuarios" || $enlaces == "editar" || $enlaces == "salir" || $enlaces == "productos" || $enlaces=="registro_producto" || $enlaces == "editar_producto"){

			$module =  "views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "views/modules/productos.php";
		
		}

		else if($enlaces == "ok"){

			$module =  "views/modules/registro.php";
		
		}

		else if($enlaces == "fallo"){

			$module =  "views/modules/ingresar.php";
		
		}

		else if($enlaces == "cambio"){

			$module =  "views/modules/usuarios.php";
		
		}

		else{

			$module =  "views/modules/registro.php";

		}
		
		return $module;

	}

}

?>