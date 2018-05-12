<?php
	require_once("connection_credentials.php");//se importa el archivo de conexion
	function addUser($id, $nombre, $posicion, $carrera, $email, $tablename){ //Funcion que inserta un registro en una tabla ya sea de futbolistas o basquetbolistas (se recibe el nombre de la tabla como parametro)
		global $pdo;
		$sql = "INSERT INTO $tablename(id, nombre, posicion, carrera, email) VALUES('$id','$nombre', '$posicion', '$carrera','$email')"; //se crea la sentencia sql a ejecutar adjuntando los parametros a insertar
		$query = $pdo->prepare($sql); //se prepara la consulta
		if($query->execute()) //se ejecuta la consulta
			return true;
		return false;
	}
	function update($id, $nombre, $posicion, $carrera, $email, $tablename){ //Funcion que actualiza un registro en una tabla ya sea de futbolistas o basquetbolistas (se recibe el nombre de la tabla como parametro)
		global $pdo;
		$sql = "UPDATE $tablename SET nombre='$nombre', posicion='$posicion', carrera='$carrera', email='$email' WHERE id='$id'"; //se crea la consulta para actualizar los datos
		$query = $pdo->prepare($sql); //se prepara la consulta
		if($query->execute()) //se ejecuta la consulta
			return true;
		return false;
	}

	function getTable($tablename){ //Funcion que inserta un registro en una tabla ya sea de futbolistas o basquetbolistas (se recibe el nombre de la tabla como parametro)
		global $pdo;
		$sql = "SELECT * FROM $tablename"; //se crea la sentencia sql a ejecutar adjuntando los parametros a insertar
		$query = $pdo->prepare($sql); //se prepara la consulta
		if($query->execute()) //se ejecuta la consulta
			return $query;
		return false;
	}

	function verifyUser($id, $tablename){ //funcion que verifica si el id de usuario existe en la tabla especificada en el parametro tablename, si NO existe se devuelve TRUE, sino FALSE
		global $pdo;
		$sql = "SELECT * FROM $tablename WHERE id='$id'";//Se crea la consulta que se ejecutara
		$query = $pdo->prepare($sql); //se prepara la consulta
		$query->execute(); //se ejecuta la consulta
		$result = $query->fetch();
		if($result)//si existe registro se retorna falso sino verdadero
			return false;
		else
			return true;
	}
	function get_user($id, $tablename){ //funcion que dado un id de registro y un nombre de tabla retorna la informacion del usuario ingresado
		global $pdo;
		$sql = "SELECT * FROM $tablename WHERE id='$id'";//Se crea la consulta que se ejecutara
		$query = $pdo->prepare($sql); //se prepara la consulta
		if($query->execute())//se ejecuta la consulta
			return $query; //Si tiene resultados regresa la variable query con el resultado
		else
			return false;
	}

	function delete($id,$tablename){//Funcion que dado un id de registro y un nombre de tabla elimina el registro ingresado
		global $pdo;
		$sql = "DELETE FROM $tablename WHERE id='$id'"; //se crea la consulta que eliminara el registro
		$query = $pdo->prepare($sql); //se prepara la consulta
		if($query->execute())//se ejecuta la consulta
			return true;
		else
			return false;

	}







?>