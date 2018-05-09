<?php
	require_once("connection_credentials.php");
	$connection = new mysqli(SERVER_DB,USER_DB,PASSWORD_DB,DB_NAME);
	if($connection->connect_errno){
		die("Error en la conexion {$con->connect_errno}");
	}

	function add($name, $email){ //Funcion que inserta en la tabla user de la BD
		global $connection;
		$query = "INSERT INTO user(nombre, correo) VALUES('$name', '$email')";
		if($connection->query($query))
			return true;
		return false;
	}

	function update_user($id, $name, $email){ //Funcion que actualiza en la tabla user de la BD
		global $connection;
		$query = "UPDATE user SET nombre='$name', correo='$email' WHERE id=$id";
		if($connection->query($query))
			return true;
		return false;
	}

	function get_user($id){ //Funcion que devuelve un array con los datos del usuario ingresado
		global $connection;
		$query = "SELECT * FROM user WHERE id=$id";
		$result = $connection->query($query);
		if($result->num_rows)
			return $result;
		else
			return false;
	}

	function run_query(){ //Funcion que devuelve un array con los datos de todos los usuarios
		global $connection;
		$query = "SELECT * FROM user";
		$result = $connection->query($query);
		if($result->num_rows)
			return $result;
		else
			return false;
	}

	function delete_user($id){ //Funcion que elimina un usuario dado un id
		global $connection;
		$query = "DELETE FROM user WHERE id=$id";
		if($connection->query($query))
			return true;
		else
			return false;
		
	}
    





?>