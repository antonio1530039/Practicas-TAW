<?php
  require_once('../db/database_utilities.php'); //se importa el archivo.php que contiene las funciones requeridas para trabajar con la bd

  //Sacar informacion de tabla futbolistas llamando la funcion getTable
  $futbolistas = getTable("futbolistas");
                  
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div>
        <h3>Futbolistas registrados</h3>
          <p>Listado</p>
        <input type="button" name="btn_back" value="Registrar futbolista" onclick="window.location = 'add_futbolista.php'" class="button tiny success">
        <input type="button" name="btn_back" value="Volver al Menu" onclick="window.location = 'index.php'" class="button tiny secondary">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($futbolistas){ //se verifica que se retorno algo en la consulta?>
              <table>
                <thead>
                  <tr>
                    <th width="200">ID</th>
                    <th width="250">Nombre</th>
                    <th width="250">Posicion</th>
                    <th width="250">Carrera</th>
                    <th width="250">Email</th>
                    <th width="250"></th>
                    <th width="250"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $c=0; //variable de contador para saber cuantos registros hay en la base de datos
                  while($fila = $futbolistas->fetch()){ //Se hace un ciclo para imprimir fila por fila de lo obtenido por la consulta sql, con la funcion fetch se asocia el array de resultado
                  $c++;
                  ?>
                  <tr>
                    <td><?php echo $fila['id'] ?></td>
                    <td><?php echo $fila['nombre'] ?></td>
                    <td><?php echo $fila['posicion'] ?></td>
                    <td><?php echo $fila['carrera'] ?></td>
                    <td><?php echo $fila['email'] ?></td>
                    <td><a href="./key.php?id=<?php echo $fila['id']; ?>&type=futbolistas" class="button radius tiny secondary">Ver detalles</a></td>
                    <td><a href="./delete.php?id=<?php echo $fila['id']; ?>&type=futbolistas" class="button radius tiny alert" onclick='confirmAction();'>Eliminar</a></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $c; ?></td>
                  </tr>
                </tbody>
              </table>
              <?php }else{ ?>
              No hay registros
              <?php } ?>
            </div>
          </section>
        </div>
      </div>

    </div>
    <script type="text/javascript">
      function confirmAction(){
        var conf = confirm("Se eliminara el usuario, desea continuar?");
        if(!conf)
          event.preventDefault();
      }
    </script>

    <?php require_once('footer.php'); ?>