<?php

class MVC{
	public function showTemplate(){
		include "view/template.php";
	}

	//funcion que toma de la variable get el valo de esta y manda llamar al modelo
	public function enlacePaginasController(){
		if(isset($_GET['action'])){
			$enlace = $_GET['action'];
		}else{
			$enlace = 'index';
		}
		//peticion al modelo
		$peticion = Enlaces::enlacesPaginasModel($enlace);
		//se incluye la peticion
		include $peticion;
	}

	//funcion que crea una tabla con la informacion de empleados
	public function getEmpleadosController(){
		//peticion al modelo mandando como parametro el nombre de la tabla
		$informacion = Crud::vistaXTablaModel("empleados");
		if(!empty($informacion)){ //se revisa que haya registros
			foreach ($informacion as $row => $item) { //se realiza un for para mostrar datos
				echo "<tr>"; //se muestran los datos en una tabla
				echo "<td>".$item['id']."</td>";
				echo "<td>".$item['nombre']."</td>";
				echo "<td>".$item['telefono']."</td>";
				echo "<td>"."<a href=index.php?action=editar_empleado&id=".$item['id']." class='button radius tiny secondary'>Ver detalles</a></td>";
				echo "<td>"."<a href=index.php?action=borrar&tipo=empleados&id=".$item['id']." class='button radius tiny warning' onclick='confirmar();'>Borrar</a></td>";

			}
		}
		
	}

	//funcion que imprime un mensaje de inicio
	public function mostrarInicioController(){
		echo "<center><h1>Bienvenido!</h1></center>";
	}

	//funcion que verifica si se dio clic en un boton y se inserta en la bd mediante una funcion de modelo
	public function registroEmpleadoController(){
		if(isset($_POST['btn_agregar'])){ //verificar si el boton se dio clic
			//se crea el array asociativo contenedor de la informacion a insertar
			$data = array('nombre'=> $_POST['nombre'],
						'telefono'=> $_POST['telefono']
					);
			//se ejecuta la funcion del modelo, mandando como parametros el array de datos
			$registro = Crud::registroEmpleadoModel($data);
			if($registro == "success"){ //se verifica si se ejecuto correctamente todo
				header("Location: index.php?action=empleados"); //se redirecciona a la pag de empleados
			}else{
				echo "<script>alert('Error al registrar')</script>";
			}
		}
	}

	//funcion que obtiene mediante el metodo get un id y muestra los datos
	public function getEmpleadoController(){
		$id = (isset($_GET['id'])) ? $_GET['id'] : ""; //se cacha del metodo get el id del empleado
		$peticion = Crud::getRegModel($id, 'empleados'); //se ejecuta la func del modelo que obtiene el registro mandando como parametro el id y el nombre de la tabla
		if(!empty($peticion)){ //se verifica que exista el registro (que la respuesta no este vacia)
			//se crean los controles con los datos del registro
			echo "<p>
              <label>Id</label>
              <input type='text' name='id' placeholder='Matricula' required='' value='".$peticion['id']."' readonly='true'>
            </p>";
            echo "<p>
              <label>Nombre</label>
              <input type='text' name='nombre' placeholder='Nombre' required='' value='".$peticion['nombre']."'>
            </p>";
            echo "<p>
              <label>Telefono</label>
              <input type='text' name='telefono' placeholder='Telefono' required='' value='".$peticion['telefono']."'>
            </p>";
            
		}
	}

	//Funcion que verifica si se dio clic en un boton y actualiza el 
	public function actualizarAlumnoController(){
		if(isset($_POST['btn_actualizar'])){
			$data = array(
				"nombre"=>$_POST['nombre'],
				"carrera"=>$_POST['carrera'],
				"tutor"=>$_POST['tutor']
			);

			//Model
			$peticion = Crud::actualizarAlumnoModel($data, $_POST['matricula']);
			if($peticion == "success"){
				header("Location: index.php?action=alumnos");
			}else{
				echo "<script>alert('Error al actualizar')</script>";
			}
		}
	}

	//funcion que verifica si se dio clic en un boton y se actualiza un registro correspondiente
	public function actualizarMaestroController(){
		if(isset($_POST['btn_actualizar'])){ //se verifica si se dio clic ene l boton
			//se crea el array associativo con los datos a actualizar
			$data = array(
				"nombre"=>$_POST['nombre'],
				"telefono"=>$_POST['telefono']
			);

			//Se ejecuta la funcion que actualiza el empleado mandando como parametros los datos a actualizar de los controles y el id del empleado
			$peticion = Crud::actualizarEmpleadoModel($data, $_POST['id']);
			if($peticion == "success"){ //verificar operacion correcta
				header("Location: index.php?action=empleados"); //se reedirige a la pag empleados
			}else{
				echo "<script>alert('Error al actualizar')</script>";
			}
		}
	}

	//funcion que dado un id de un registro y un nombre de tabla borra el regristro de esta
	public function borrarController($id, $tabla){
		$peticion = Crud::borrarXModel($id, $tabla); //se ejecuta la fucnion del modelo que borra el registro mandando como parametro el id y el nombre de la tabla
		if($peticion == "success"){ //verificar operacion correcta
			header("Location: index.php?action=$tabla"); //redireccionar a la pag empleados
		}else{
			echo "<script>alert('Error al borrar')</script>";
		}
	}




}





?>