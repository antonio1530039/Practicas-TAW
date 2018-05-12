<?php
  require_once('../db/database_utilities.php');//se importa el archivo.php que contiene las funciones requeridas para trabajar con la bd
  //Inicializacion de variables tomandolas del array GET
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $type = isset($_GET['type']) ? $_GET['type'] : '';
  if($type == "futbolistas" || $type=="basquetbolistas"){
  	if(!verifyUser($id,$type)){ //se verifica que exista el usuario en la bd
	      delete($id,$type);
	 }
	 header("Location: $type.php");
  }else{
  	header("Location: index.php");
  }
  

?>