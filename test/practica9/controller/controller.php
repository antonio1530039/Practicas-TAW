<?php

class MVC{
	public function showTemplate(){
		include "view/template.php";
	}

	public function enlacePaginasController(){
		if(isset($_GET['action'])){
			$enlace = $_GET['action'];
		}else{
			$enlace = 'index';
		}
		//peticion al modelo
		$peticion = Enlaces::enlacesPaginasModel($enlace);

		include $peticion;
	}


	public function getEmpleadosController(){
		$informacion = Crud::vistaXTablaModel("empleados");
		if(!empty($informacion)){
			foreach ($informacion as $row => $item) {
				echo "<tr>";
				echo "<td>".$item['id']."</td>";
				echo "<td>".$item['nombre']."</td>";
				echo "<td>".$item['telefono']."</td>";
				echo "<td>"."<a href=index.php?action=editar_empleado&id=".$item['id']." class='button radius tiny secondary'>Ver detalles</a></td>";
				echo "<td>"."<a href=index.php?action=borrar&tipo=empleados&id=".$item['id']." class='button radius tiny warning' onclick='confirmar();'>Borrar</a></td>";

			}
		}
		
	}

	
	public function mostrarInicioController(){
		echo "<center><h1>Bienvenido!</h1></center>";
	}


	public function registroEmpleadoController(){
		if(isset($_POST['btn_agregar'])){
			$data = array('nombre'=> $_POST['nombre'],
						'telefono'=> $_POST['telefono']
					);
			$registro = Crud::registroEmpleadoModel($data);
			if($registro == "success"){
				header("Location: index.php?action=empleados");
			}else{
				echo "<script>alert('Error al registrar')</script>";
			}
		}
	}

	
	public function getEmpleadoController(){
		$id = (isset($_GET['id'])) ? $_GET['id'] : "";
		$peticion = Crud::getRegModel($id, 'empleados');
		if(!empty($peticion)){
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

	public function actualizarMaestroController(){
		if(isset($_POST['btn_actualizar'])){
			$data = array(
				"nombre"=>$_POST['nombre'],
				"telefono"=>$_POST['telefono']
			);

			//Model
			print_r($data);
			$peticion = Crud::actualizarEmpleadoModel($data, $_POST['id']);
			if($peticion == "success"){
				header("Location: index.php?action=empleados");
			}else{
				echo "<script>alert('Error al actualizar')</script>";
			}
		}
	}

	public function borrarController($id, $tabla){
		$peticion = Crud::borrarXModel($id, $tabla);
		if($peticion == "success"){
			header("Location: index.php?action=$tabla");
		}else{
			echo "<script>alert('Error al borrar')</script>";
		}
	}




}





?>