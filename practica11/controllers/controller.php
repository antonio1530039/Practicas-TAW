<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}

	//funcion que verifica si una cadena contiene solamente 0 y 1
	public function verificarBinario($binario){
		for($i = 0 ; $i < strlen($binario); $i++){
			if($binario[$i]!="1" && $binario[$i]!="0")
				return false;
		}
		return true;
	}

	public function convertidor(){
		if(isset($_POST['btn'])){
			//convertir de binario a las demas conversiones
			if($_POST['binario'] != "0" && $this->verificarBinario($_POST['binario'])){
				$decimal = bindec($_POST['binario']); //binario a decimal
				$octal = decoct($decimal); //decimal a octal
				$hexadecimal = dechex($decimal); //decimal a hexadecimal
				//impresion de los valores
				echo "<center><h1>BINARIO A DECIMAL:  ".$decimal."</h1></center>";
				echo "<center><h1>BINARIO A OCTAL:  ".$octal."</h1></center>";
				echo "<center><h1>BINARIO A HEXADECIMAL:  ".$hexadecimal."</h1></center>";
			}else if($_POST['octal'] != "0"){ //convertir de octal
				$decimal = octdec($_POST['octal']); //conversion a decimal
				$binario = decbin($decimal); //conversion a binario
				$hexadecimal = dechex($decimal); //conversion a hexadecimal
				//impresion de los valores
				echo "<center><h1>OCTAL A BINARIO:  ".$binario."</h1></center>";
				echo "<center><h1>OCTAL A DECIMAL:  ".$decimal."</h1></center>";
				echo "<center><h1>OCTAL A HEXADECIMAL:  ".$hexadecimal."</h1></center>";
			}
			else if($_POST['hexadecimal'] != "0"){ //conversion de hexadecimal a los demas sistemas
				$decimal = hexdec($_POST['hexadecimal']);
				$octal = decoct($decimal);
				$binario = decbin($decimal);
				echo "<center><h1>HEXADECIMAL A BINARIO:  ".$binario."</h1></center>";
				echo "<center><h1>HEXADECIMAL A OCTAL:  ".$octal."</h1></center>";
				echo "<center><h1>HEXADECIMAL A DECIMAL:  ".$decimal."</h1></center>";
			}
		}
	}




	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuarioRegistro"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "usuario"=>$_POST["usuarioRegistro"], 
								      "password"=>$_POST["passwordRegistro"],
								      "email"=>$_POST["emailRegistro"]);

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){

				header("location:index.php?action=ok");

			}

			else{

				header("location:index.php");
			}

		}

	}


	//funcion que verifica si el usuario inicio sesion
	public function verificarUsuarioIngresado(){
		session_start(); //se abre la sesion
		//se verifica que si esta verdadera la variable validar de sesion
		if(!$_SESSION["validar"]){

			header("location:index.php?action=ingresar");

			exit();

		}
	}




	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( "usuario"=>$_POST["usuarioIngreso"], 
								      "password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");
			//Valiación de la respuesta del modelo para ver si es un usuario correcto.
			if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){

				session_start();

				$_SESSION["validar"] = true;

				header("location:index.php?action=usuarios");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}

	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("usuarios");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><a class="btn btn-warning" href="index.php?action=editar&id='.$item["id"].'">Editar</a></td>
				<td><a class="btn btn-danger" href="index.php?action=usuarios&idBorrar='.$item["id"].'">Borrar</a></td>
			</tr>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar" class="form-control">

			 <input type="text" value="'.$respuesta["usuario"].'" name="usuarioEditar" required class="form-control">

			 <input type="text" value="'.$respuesta["password"].'" name="passwordEditar" required class="form-control">

			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" required class="form-control"><br>

			 <input type="submit" value="Actualizar" class="btn btn-success">';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){

			$datosController = array( "id"=>$_POST["idEditar"],
							          "usuario"=>$_POST["usuarioEditar"],
				                      "password"=>$_POST["passwordEditar"],
				                      "email"=>$_POST["emailEditar"]);
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");

			if($respuesta == "sxss"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}

}






////
?>