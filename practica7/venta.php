<?php
//Verificar que el usuario se haya logueado
  session_start();
  if($_SESSION){
    if(empty($_SESSION["login"])){
      header("Location: login.php");
    }
  }else{
    header("Location: login.php");
  }
  require_once('./db/database_utilities.php'); //se importa el archivo.php que contiene las funciones requeridas para trabajar con la bd
  //Obtener id de venta o folio
  $sqlX = "SELECT MAX(id) FROM venta"; //sentencia a ejecutar
  $queryX = $pdo->prepare($sqlX); //se prepara la consulta
  $queryX->execute();
  $resultadosx = $queryX->fetch();
  $idx = $resultadosx[0];

  if(isset($_POST['registrar'])){
  	$i=0;
  	$monto = $_POST['total'];
  	$fecha = date('Y-m-d');
  	//Registrar venta
  	$sql = "INSERT INTO venta(monto, fecha) VALUES($monto, ?)"; //se insertara el registro
	$query = $pdo->prepare($sql); //se prepara la consulta
	$query->bindparam(1,$fecha); //se asocia la fecha para que se inserte con el formato correcto
	$query->execute();

	//Obtener id de venta o folio
	$sql2 = "SELECT MAX(id) FROM venta"; //sentencia a ejecutar
	$query2 = $pdo->prepare($sql2); //se prepara la consulta
	$query2->execute();
	$resultados = $query2->fetch();
	$id = $resultados[0];


	//Insertar en la tabla venta_producto (detalle)
  	while(!empty($_POST['js_id'.$i])){
  		$id_producto = $_POST['js_id'.$i]; //Obtener valores de productos de las cajas de texto
  		$cant = $_POST['js_cantidad'.$i];
  		$precio_v = $_POST['js_precio_venta'.$i];
  		$importe = $_POST['js_importe'.$i];
  		$sql3 = "INSERT INTO venta_producto(folio_venta, id_producto, cantidad, precio_venta, importe) VALUES($id,$id_producto, $cant,$precio_v, $importe)"; //se insertara el registro
		  $query3 = $pdo->prepare($sql3); //se prepara la consulta
		  $query3->execute();

  		$i++;
  	}
    echo "<script>alert('Venta registrada');</script>";
    header("Refresh:0");
  }
                  
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Realizar venta</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
      <div>
        <h3>Realizar venta</h3>
        <input type="button" name="btn_back" value="Volver al Menu" onclick="window.location = 'index.php'" class="button tiny secondary">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content">
            <form method="post" action="">
              <table width="100%">
              	<thead>
              		<tr>
              			<td>Producto</td>
              			<td>Cantidad</td>
              			<td></td>
              		</tr>
              	</thead>
              	<tr>
              		<td>
			              <select name="id_producto" id="id_producto">
			              <?php

                    //Sacar informacion de tabla productos
                      $sqlx = "SELECT * FROM producto WHERE deleted=0"; //se crea la sentencia sql a ejecutar
                      $products = $pdo->prepare($sqlx); //se prepara la consulta
                      $products->execute(); //se ejecuta la consulta
			              	$jsInfo =array(); //array contenedor de la informacion de cada producto para poder realizar operaciones con JavaScript
			              	$count = 0; //contador para asignar indices internos para manejo de javascript
			              	while($fila = $products->fetch()){
			              		echo "<option value=".$count.">".$fila['id']." | ".$fila['nombre']." | $ ".$fila['precio_unitario']."</option>";//mostrar productos en el select
			              		$jsInfo[] = ['id'=>$fila['id'], 'nombre'=>$fila['nombre'], 'precio'=>$fila['precio_unitario']]; //guardado de informacion de cada producto en array asociativo
			              		$count++;
			              	}

			              	echo json_encode($jsInfo); //pasar el array a javascript mediante json_encode
			              ?>
			              </select>


			              
              		</td>
              		<td>
              			<input type="number" name="cantidad" id='cantidad' placeholder="Cantidad">
              		</td>
              		<td>
              			<center><input type="button" name="x" value="Agregar" onclick="add();" class="button tiny success">
              		</td>
              	</tr>
              </table>
              <p>
              	<h3>Información de la venta</h3>
              </p>
              <p>
              	<h5 name='fecha' style="text-align: right;font-weight: bold;">Folio: <?php echo ($idx+1) ?>       | Fecha: <?php echo date('Y-m-d') ?></h5>
              	<h5 style="text-align: right;font-weight: bold;">Total de la venta:</h5>
              	<input name='total' id="total" style="text-align: center;font-weight: bold;" value="0.0"></input>
              	<input name='registrar' type="submit" style="float:right" value="Registrar venta" class="button tiny success" onclick="check();"></input>
              </p>
              <table width="100%" id="table_products">
              	<thead>
              		<tr>
              			<td>ID Producto</td>
              			<td>Nombre</td>
              			<td>Cantidad</td>
              			<td>Promedio por unidad</td>
              			<td>Importe</td>
              		</tr>
              	</thead>
              </table>
 	</form>
            </div>
          </section>
        </div>
      </div>

    </div>
    <script type="text/javascript">
    var productos = <?php echo json_encode($jsInfo)?>; //se obtiene el array pasado de php
    var table = document.getElementById('table_products');
    var cont=0;
    var total=0.0;
      function add(){//funcion que agrega una fila a la tabla de productos de la pagina web
      	var cantidad = document.getElementById('cantidad').value;
      	if(cantidad!=""){
			//se obtienen los datos de las cajas de texto
	      	var selected_prod = document.getElementById('id_producto').value;
	      	var txt_total = document.getElementById('total');
	      	cantidad = Math.round(cantidad);

	      	//se crean los elementos que se asignaran a la fila de la tabla
	      	var tr = document.createElement("tr");

	      	var td_id = document.createElement('td');
	      	var i_id = document.createElement('input');

	      	var td_nombre = document.createElement('td');

	      	var td_cantidad = document.createElement('td');
	      	var i_cantidad = document.createElement('input');

	      	var td_precio_venta = document.createElement('td');
	      	var i_precio_venta = document.createElement('input');

	      	var td_importe = document.createElement('td');
	      	var i_importe = document.createElement('input');

	      	//td_id.innerHTML=productos[parseInt(selected_prod)]['id'];
	      	i_id.setAttribute("name","js_id"+cont);
	      	i_id.value=productos[parseInt(selected_prod)]['id'];
	      	i_id.setAttribute("readonly","true");
	      	td_id.appendChild(i_id);

	      	td_nombre.innerHTML = productos[parseInt(selected_prod)]['nombre'];

	      	//td_cantidad.innerHTML = cantidad;
	      	i_cantidad.value = cantidad;
	      	i_cantidad.setAttribute("name","js_cantidad"+cont);
	      	i_cantidad.setAttribute("readonly","true");
	      	td_cantidad.appendChild(i_cantidad);

	      	var importe = Math.round(cantidad * productos[parseInt(selected_prod)]['precio'],2);
	      	total+=importe;
	      	txt_total.innerHTML = "Total: $ "+ total.toFixed(2);
	      	txt_total.value = total.toFixed(2);
	      	
	      	i_importe.value = importe;
	      	i_importe.setAttribute("name","js_importe"+cont);
	      	i_importe.setAttribute("readonly","true");
	      	td_importe.appendChild(i_importe);
	      	
	      	i_precio_venta.value = (importe / cantidad).toFixed(2);
	      	i_precio_venta.setAttribute("name","js_precio_venta"+cont);
	      	i_precio_venta.setAttribute("readonly","true");
	      	td_precio_venta.appendChild(i_precio_venta);
	      	
	      	tr.appendChild(td_id);
	      	tr.appendChild(td_nombre);
	      	tr.appendChild(td_cantidad);
	      	tr.appendChild(td_precio_venta);
	      	tr.appendChild(td_importe);
	      	table.appendChild(tr);
	      	cont++;

      	}
      	


      }

      function check(){
      		if(cont==0){
      			event.preventDefault();
      			alert("Para registrar la venta debes añadir al menos un producto a esta");
      		}
      	}

    </script>

    <?php require_once('footer.php'); ?>