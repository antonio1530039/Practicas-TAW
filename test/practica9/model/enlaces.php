<?php

class Enlaces{
	public function enlacesPaginasModel($enlace){
		
		if($enlace == "empleados"){
			$module = "view/$enlace/$enlace.php";
		}else if($enlace == "registro_empleado" || $enlace == "editar_empleado"){
			$module = "view/empleados/$enlace.php";
		}else if($enlace == "borrar"){
			$module = "model/borrar.php";
		}
		else{
			$module = "view/inicio.php";
		}
		return $module;
	}
}



?>