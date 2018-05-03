<?php
	//Ejercicio 1. Ordenar un array ascendente y descendente.
	function printArray($a){
		for($i=0;$i< count($a); $i++)
				echo "$a[$i] <br>";
	}
	$arr = array(10,30,2,324,123,80,40);
	echo "Array original<br>";
	printArray($arr);

	sort($arr);
	echo "<br>Array ordenado ascendente <br>";
	printArray($arr);

	rsort($arr);
	echo "<br> Array ordenado descendente<br>";
	printArray($arr);
?>