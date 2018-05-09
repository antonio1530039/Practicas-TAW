<?php
  require_once("database_utilities.php");
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  if(delete_user($id))
    header("Location: index.php");
  else
    echo "<script>alert('Error al eliminar el usuario!');</script>";
?>