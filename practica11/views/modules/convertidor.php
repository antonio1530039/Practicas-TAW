<!-- Registro de producto -->
<center>
	<div class="containter">
	  <div class="col-sm-8">
		<form method="post" class="form-group">

<h1>CONVERTIDOR Y CODIFICADOR DE CODIGOS EN LINEA</h1>
	<p><label>Binario:</label>
		<input type="number" placeholder="Binario" id="binario" name="binario" required class="form-control" value="0">
	</p>
	<p>
		<label>Octal:</label>
		<input type="number" placeholder="Octal" id="octal" name="octal" required class="form-control" value="0">
	</p>
	<p>
		<label>Decimal:</label>
		<input type="number" placeholder="Decimal" id="decimal" name="decimal" required class="form-control" value="0">
	</p>
	<p>
		<label>Hexadecimal:</label>
		<input type="number" placeholder="Hexadecimal" id="hexadecimal" name="hexadecimal" required class="form-control" value="0">
	</p>
	<br>
	<input type="submit" value="Codificar" name="btn" class="btn btn-success" onclick="convert();">
</form>

</div>
</div>
</center>
<?php
	$con = new MvcController();
	$con->convertidor();
?>