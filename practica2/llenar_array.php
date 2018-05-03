<?php
//Ejercicio 3. Llenar un array de 10 posiciones e imprimirlos en un ciclo for.
	$arra = array(4,3,234,542,5,7,1,52,3,6);
	echo "Longitud del array ".count($arra);
	echo "<br><h2>Valores</h2>";
	for($i=0;$i<count($arra);$i++)
		echo "<br>POSICION[$i] : <strong>$arra[$i]</strong>";
?>