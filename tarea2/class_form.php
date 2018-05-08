<?php
	//Clase xform almacena datos de los controles del formulario
	class xform
	{
		//Atributos publicos que contendran el mensaje de error del respectivo control
		public $nameErr, $emailErr,  $genderErr, $websiteErr;
		//Atributos publicos que contendran los datos de los controles
		public $name, $email, $gender, $comment,  $website;

		//Constructor de la claserecibe como parametros los datos de los controles y los asigna a los atributos de la clase
		function __construct($name, $email, $gender, $comment, $website)
		{
			$this->name=$name;$this->email=$email;$this->gender=$gender;$this->comment=$comment;
			$this->website=$website;
		}

		//Metodo validateAll: ejecuta las funciones de validacion de cada respectivo atributo, asi como la validacion de forma manual del atributo comment y gender
		public function validateAll(){
			$this->validateName();
			$this->validateEmail();
			$this->validateWebsite();
			if(empty($this->comment)) $this->comment=""; else $this->comment=$this->test_input($this->comment);
			if(empty($this->gender)){
				$this->gender=""; $this->genderErr="Gender is required ";
			}else{
				$this->gender=$this->test_input($this->gender);
			}
		}
		//Metodo validateName: valida el dato del atributo name y asigna el mensaje de error a su respectivo atributo en caso de estar vacio este o contener numeros.
		private function validateName(){
			if (empty($this->name)) {
		        $this->nameErr = "Name is required";
		    } else {
		        $this->name = $this->test_input($this->name);
		        // Filtro que verifica si el nombre contiene solo letras
		        if (!preg_match("/^[a-zA-Z ]*$/",$this->name))
		            $this->nameErr = "Only letters and white space allowed";
		    }
		}

		//Metodo validateEmail: valida el dato del atributo email y asigna el mensaje de error a su respectivo atributo en caso de estar vacio este o no tener el formato de un email.
		private function validateEmail(){
			if (empty($this->email)) {
		       $this->emailErr = "Email is required";
		    } else {
		        $this->email = $this->test_input($this->email);
		        // Filtro que verifica que el dato ingresado tenga la estructura de un email
		        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
		            $this->emailErr = "Invalid email format";
		    }
		}

		//Metodo validateWebsite: valida el dato del atributo website y asigna el mensaje de error a su respectivo atributo en caso de estar vacio este o no tener el formato de una pag web.
		private function validateWebsite(){
			if (empty($this->website)) {
		        $this->website = "";
		    } else {
		        $this->website = $this->test_input($this->website);
		        // Filtro que verifica que se cumpla la estructura de una direccion de un sitio web
		        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$this->website))
		            $this->websiteErr = "Invalid URL";
		    }
		}

		//Metodo test_input: recibe como parametro un dato string y aplica diferentes filtros como lo es trim; quita espacios e la cadena, stripslashes: remueve diagonales, htmlspecialchars; convierte a cadena en si, aun y si la cadena contiene codigo HTML.
		private function test_input($data) {
		    $data = trim($data);
		    $data = stripslashes($data);
		    $data = htmlspecialchars($data);
		    return $data;
		}
		//Metodo printInput: imprime en pantalla los datos de los controles ingresados (o atributos de la clase)
		public function printInput(){
			echo "<h2>Your Input:</h2> $this->name <br> $this->email <br> $this->website <br> $this->comment <br> $this->gender";
		}
	}
?>