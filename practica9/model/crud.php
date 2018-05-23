<?php

require_once "conexion.php";

class Crud extends Conexion{
	
	//Funcion que dado un nombre de tabla trae de la BD los registros de esta
	public function vistaXTablaModel($table){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}

	//Funcion que dado un array assoc inserta los datos en la tabla empleado
	public function registroEmpleadoModel($data){
		//Se prepara la conexion
		$stmt = Conexion::conectar()->prepare("INSERT INTO empleados(nombre, telefono) VALUES(:nombre, :telefono)");
		$stmt->bindParam(":nombre", $data['nombre']); //se preparan los parametros
		$stmt->bindParam(":telefono", $data['telefono']);
		if($stmt->execute()) //se ejecuta y si se realiza correctamente retorna success
			return "success";
		else
			return "error";
		$stmt->close();
	}


//Funcion que dado un id y un nombre de tabla, retorna el registro en un array asociativo
	public function getRegModel($id, $table){
		if($table=="empleados"){ //se castea el tipo para sacar el nombre del campo id
			$idName = "id";
		}
		//se prepara la conexion
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $idName = :id");
		$stmt->bindParam(":id",$id); //se inserta el id con bindParam
		$stmt->execute(); //se ejecuta la consulta
		return $stmt->fetch(); //se asocia el resultado
		$stmt->close();
	}

	//Funcion que dado un array assoc y un id, actualiza el registro en la bd
	public function actualizarEmpleadoModel($data, $id){
		$stmt = Conexion::conectar()->prepare("UPDATE empleados SET nombre = :nombre, telefono = :telefono WHERE id = $id"); //se prepara la consulta
		$stmt->bindParam(":nombre", $data['nombre']); //se asocian los parametros seleccionados
		$stmt->bindParam(":telefono", $data['telefono']);
		if($stmt->execute()) //se ejecuta la consulta
			return "success";
		else
			return "error";
		$stmt->close();


	}

	//funcion que dado un id y un nombre de tabla, borra el reigstro de esta
	public function borrarXModel($id, $table){
		if($table=="empleados"){ //casteo del nombre del campo id
			$idName = "id";
		}
		$stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE $idName = :id"); //preparar consulta
		$stmt->bindParam(":id",$id); //asociar paramretros
		
		if($stmt->execute()){ //ejecutar consulta
			return "success";
		}else{
			return "error";
		}
		$stmt->close(); //cerrar conexion
	}

}



?>