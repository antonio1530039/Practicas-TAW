<?php

require_once "conexion.php";

class Crud extends Conexion{
	

	public function vistaXTablaModel($table){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}

	public function registroEmpleadoModel($data){
		$stmt = Conexion::conectar()->prepare("INSERT INTO empleados(nombre, telefono) VALUES(:nombre, :telefono)");
		$stmt->bindParam(":nombre", $data['nombre']);
		$stmt->bindParam(":telefono", $data['telefono']);
		if($stmt->execute())
			return "success";
		else
			return "error";
		$stmt->close();
	}



	public function getRegModel($id, $table){
		if($table=="empleados"){
			$idName = "id";
		}
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $table WHERE $idName = :id");
		$stmt->bindParam(":id",$id);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public function actualizarEmpleadoModel($data, $id){
		$stmt = Conexion::conectar()->prepare("UPDATE empleados SET nombre = :nombre, telefono = :telefono WHERE id = $id");
		$stmt->bindParam(":nombre", $data['nombre']);
		$stmt->bindParam(":telefono", $data['telefono']);
		if($stmt->execute())
			return "success";
		else
			return "error";
		$stmt->close();


	}

	
	public function borrarXModel($id, $table){
		if($table=="empleados"){
			$idName = "id";
		}
		$stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE $idName = :id");
		$stmt->bindParam(":id",$id);
		
		if($stmt->execute()){
			return "success";
		}else{
			return "error";
		}
		$stmt->close();
	}

}



?>