<?php
	/*
	Clase
		Es un modelo que se utiliza para crear objetos que comparten un mismo comportamiento , estado e identidad
	*/
	class Automovil{
		/*
			Propiedades:
			Son las caracteristicas que puede tener un objeto
		*/
		public $marca;
		public $modelo;
		/*
		Modelo:
		Es el algoritmo asociado a un objeto que indica de lo que este puede hacer.
		Launica diferencia entre metodo y funcion, es que llamamos metodo a las funciones de una clase en POO.
		mientras que llamamos funciones a los algoritmos de PE
		*/
		public function mostrar(){
			echo "<p>Hola! soy un $this->marca, de modelo $this->modelo</p>";
		}
	}
	/*
		Objeto
		Es el algoritmo asociado a un objeto que indica la capacidad de lo que este hace
		Asi mismo es la entidad provista de metodos o mensajes de los cuales responde a las propiedades con valores concretos
		*/
	$a = new Automovil();
	$a->marca = "Toyota";
	$a->modelo = "Corolla";
	$a->mostrar();

	$b = new Automovil();
	$b->marca="Ford";
	$b->modelo="Fiesta";
	$b->mostrar();

	/*
	Principios de POO
		-Abstraccion
			Nuevos tipos de datos creados por el usuario
		-Encapsulamiento
			Organizacion del codigo en grupos logicos

		-Ocultamiento
			Oculta detalles de implementacion y se exponen solo lo que es necesario
	*/

?>