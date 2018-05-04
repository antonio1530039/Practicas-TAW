<?php
	$automovil1 = (object)["marca"=>"Toyota", "modelo"=>"Corolla"];
	$automovil2 = (object)["marca"=>"Nissan", "modelo"=>"Sentra"];

	function mostrar($automovil){
		echo "<p> Hola! soy un $automovil->marca, de modelo $automovil->modelo </p>";
	}

	mostrar($automovil1);
	mostrar($automovil2);



?>