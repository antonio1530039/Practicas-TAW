<?php
	class fibo
	{
		//Atributos de la clase
		private $arr=array(); //Array contenedor de los numeros
		private $arrayFibonacci=array(); //Array contenedor de la serie de Fibonacci
		//Constructor de la clase - Ejecuta el metodo fillArray
		function __construct()
		{
			$this->fillArray();
		}
		/*
			Metodo fillArray
				Se definen los valores del arreglo de 25 posiciones(arr) y se definen las primeras dos posiciones del arreglo contenedor de la serie de Fibonacci (arrayFibonacci) .. Ademas se imprime el arreglo de 25 posiciones
		*/
		private function fillArray(){
			//Definicion de los valores del arreglo
			$this->arr = array(6,21,421,324,234,23422,12,135,78,3,6,78,875,23,3,1,4,6,8,3,23,3,523,2,43);
			echo "<p><h2>Array de 25 posiciones</h2></p>";
			for($i=0;$i<25;$i++){
				$this->arrayFibonacci[$i]=0;
				echo " / ".$this->arr[$i];
			}
			$this->arrayFibonacci[0]=$this->arr[0]; $this->arrayFibonacci[1]=$this->arr[1];
		}
		/*
			Metodo performFibonacci
			Se calcula la serie a partir de las dos primeras posiciones del array de 25 posiciones (arr). El calculo de la tercera posicion del arrayFibonacci es igual a la suma de las dos posiciones anteriores, asi con todas las posiciones siguientes y esto es guardado en el array: arrayFibonacci
		*/
		public function performFibonacci(){
			for($i=2;$i<25;$i++){
				$ac=0;
				for($j=$i-2;$j<$i;$j++)
					$ac+= $this->arrayFibonacci[$j];
				$this->arrayFibonacci[$i]=$ac;
			}
		}
		/*
			Metodo que imprime el array que contiene la serie de Fibonacci
		*/
		public function printFibonacci(){
			echo "<p><h2>Serie de Fibonacci a partir de array ingresado , de 25 posiciones tambien</h2></p>";
			for($i=0;$i<25;$i++)
				echo " / ".$this->arrayFibonacci[$i];
		}

	}
	#creacion del objeto de la clase fibo
	$f = new fibo();
	#ejecucion de metodos para obtener la serie de Fibonacci e imprimir, asi como imprimir el otro arreglo de 25 posiciones
	$f->performFibonacci();
	$f->printFibonacci();


?>