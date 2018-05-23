<?php

class MvcProductos{

	#REGISTRO DE PRODUCTOS
	#------------------------------------
	public function registroProductosController(){

		if(isset($_POST["registroProducto"])){
			//Recibe a traves del método POST el name (html) de usuario, password y email, se almacenan los datos en una variable de tipo array con sus respectivas propiedades (usuario, password y email):
			$datosController = array( "nombre"=>$_POST["nombre"], 
								      "des"=>$_POST["des"],
								      "buy"=>$_POST["buy"],
								      "sale"=>$_POST["sale"],
								      "price"=>$_POST["price"]
								  );

			//Se le dice al modelo models/crud.php (Datos::registroUsuarioModel),que en la clase "Datos", la funcion "registroUsuarioModel" reciba en sus 2 parametros los valores "$datosController" y el nombre de la tabla a conectarnos la cual es "usuarios":
			$respuesta = DatosProductos::registroProductoModel($datosController);

			//se imprime la respuesta en la vista 
			if($respuesta == "success"){
				header("location:index.php?action=productos");
				echo "Registro exitoso";

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

	public function vistaProductosController(){

		$respuesta = DatosProductos::vistaProductosModel();

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["nombreProd"].'</td>
				<td>'.$item["descProduc"].'</td>
				<td>'.$item["BuyPrice"].'</td>
				<td>'.$item["SalePrice"].'</td>
				<td>'.$item["Proce"].'</td>
				<td><a class="btn btn-warning" href="index.php?action=editar_producto&id='.$item["id"].'">Editar</a></td>
				<td><a onclick="conf();" class="btn btn-danger" href="index.php?action=productos&idBorrar_producto='.$item["id"].'">Borrar</a></td>
			</tr>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarProductoController(){

		$datosController = $_GET["id"];
		$respuesta = DatosProductos::editarProductoModel($datosController);

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="id">

			 <input type="text" value="'.$respuesta["nombreProd"].'" name="nombre" required class="form-control">

			 <input type="text" value="'.$respuesta["descProduc"].'" name="des" required class="form-control">

			 <input type="number" value="'.$respuesta["BuyPrice"].'" name="buy" required class="form-control">

			 <input type="number" value="'.$respuesta["SalePrice"].'" name="sale" required class="form-control">

			 <input type="number" value="'.$respuesta["Proce"].'" name="price" required class="form-control">
			 <br>
			 <input type="submit" value="Actualizar" name="editar_btn" class="btn btn-success">';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarProductoController(){

		if(isset($_POST["editar_btn"])){

			$datosController = array( "nombre"=>$_POST["nombre"], 
								      "des"=>$_POST["des"],
								      "buy"=>$_POST["buy"],
								      "sale"=>$_POST["sale"],
								      "price"=>$_POST["price"],
								      "id"=>$_POST["id"],
								  );
			
			$respuesta = DatosProductos::actualizarProductoModel($datosController);

			if($respuesta == "success"){

				header("location:index.php?action=productos");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR PRODUCTO
	#------------------------------------
	public function borrarProductoController(){

		if(isset($_GET["idBorrar_producto"])){

			$datosController = $_GET["idBorrar_producto"];
			
			$respuesta = DatosProductos::borrarProductoModel($datosController);

			if($respuesta == "success"){

				header("location:index.php?action=productos");
			
			}

		}

	}

}






////
?>