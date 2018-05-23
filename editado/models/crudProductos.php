<?php

#EXTENSIÓN DE CLASES: Los objetos pueden ser extendidos, y pueden heredar propiedades y métodos. Para definir una clase como extensión, debo definir una clase padre, y se utiliza dentro de una clase hija.

require_once "conexion.php";

//heredar la clase conexion de conexion.php para poder utilizar "Conexion" del archivo conexion.php.
// Se extiende cuando se requiere manipuar una funcion, en este caso se va a  manipular la función "conectar" del models/conexion.php:
class DatosProductos extends Conexion{

	#REGISTRO DE PRODUCTOS
	#-------------------------------------
	public function registroProductoModel($datosModel){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO products (nombreProd, descProduc, BuyPrice, SalePrice, Proce) VALUES (:nombre,:des,:buy, :sale, :price)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datosModel["nombre"]);
		$stmt->bindParam(":des", $datosModel["des"]);
		$stmt->bindParam(":buy", $datosModel["buy"]);
		$stmt->bindParam(":sale", $datosModel["sale"]);
		$stmt->bindParam(":price", $datosModel["price"]);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}



	#VISTA PRODUCTOS
	#-------------------------------------

	public function vistaProductosModel(){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM products");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR PRODUCTO
	#-------------------------------------

	public function editarProductoModel($datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM products WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR PRODUCTO
	#-------------------------------------
	//$stmt = Conexion::conectar()->prepare("INSERT INTO products (nombreProd, descProduc, BuyPrice, SalePrice, Proce) VALUES (:nombre,:des,:buy, :sale, :price)");	
	public function actualizarProductoModel($datosModel){

		$stmt = Conexion::conectar()->prepare("UPDATE products SET nombreProd = :nombre, descProduc = :des, BuyPrice = :buy, SalePrice = :sale, Proce=:price WHERE id = :id");

		$stmt->bindParam(":nombre", $datosModel["nombre"]);
		$stmt->bindParam(":des", $datosModel["des"]);
		$stmt->bindParam(":buy", $datosModel["buy"]);
		$stmt->bindParam(":sale", $datosModel["sale"]);
		$stmt->bindParam(":price", $datosModel["price"]);
		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#BORRAR PRODUCTO
	#------------------------------------
	public function borrarProductoModel($datosModel){

		$stmt = Conexion::conectar()->prepare("DELETE FROM products WHERE id = :id");
		$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

}



?>