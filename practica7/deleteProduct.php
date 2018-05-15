<?php
  require_once('./db/database_utilities.php');//se importa el archivo.php que contiene las funciones requeridas para trabajar con la bd
  //Inicializacion de variables tomandolas del array GET
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $type = isset($_GET['type']) ? $_GET['type'] : '';
  deleteProduct($id,$type);
  header("Location: $type"."s.php")
  

?>