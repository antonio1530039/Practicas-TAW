<?php
	//Se destruye la sesion y se hace logout
	session_start();
  session_destroy();
  header("Location: login.php");
 
?>