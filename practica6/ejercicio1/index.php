<?php
  require_once('../db/connection_credentials.php'); //importar archivo de conexion necesario

  //Contar usuarios
  $sql = "SELECT COUNT(*) FROM user"; //Consulta sql que devolvera el numero de usuarios totales
  $query = $pdo->prepare($sql); //se prepara la conexion pasando como parametro la consulta sql
  $query->execute(); //se ejecuta la consulta
  $resultados = $query->fetch(); //se asocia el resultado y se obtiene un array con este
  $numberUsers = $resultados[0]; //La posicion 0 contiene el resultado debido a que es solo 1, trae el numero de usuarios devuelto por la consulta.

  //Contar tipos de usuarios
  $sql = "SELECT COUNT(*) FROM user_type"; //Consulta sql que devolvera el numero de tipos de usuarios
  $query = $pdo->prepare($sql); //se prepara la conexion pasando como parametro la consulta sql
  $query->execute(); //se ejecuta la consulta
  $resultados = $query->fetch(); //se asocia el resultado y se obtiene un array con este
  $totalTypes = $resultados[0]; //La posicion 0 contiene el resultado debido a que es solo 1 fila, trae el numero de tipos de usuarios devuelto por la consulta.

  //Contar el numero de status
  $sql = "SELECT COUNT(*) FROM status"; //Consulta sql que devolvera el numero de status
  $query = $pdo->prepare($sql); //se prepara la conexion pasando como parametro la consulta sql
  $query->execute(); //se ejecuta la consulta
  $resultados = $query->fetch(); //se asocia el resultado y se obtiene un array con este
  $totalStatus = $resultados[0]; //La posicion 0 contiene el resultado debido a que es solo 1 fila, trae el numero de status en la bd devuelto por la consulta.

  //Contar el numero de accesos
  $sql = "SELECT COUNT(*) FROM user_log"; //Consulta sql que devolvera el numero de accesos
  $query = $pdo->prepare($sql); //se prepara la conexion pasando como parametro la consulta sql
  $query->execute(); //se ejecuta la consulta
  $resultados = $query->fetch(); //se asocia el resultado y se obtiene un array con este
  $totalLog = $resultados[0]; //La posicion 0 contiene el resultado debido a que es solo 1 fila, trae el numero de accesos devuelto por la consulta.

  //Contar el numero de usuarios activos
  $sql = "SELECT COUNT(*) FROM user WHERE status_id = 1"; //Consulta sql que devolvera el numero de usuarios activos
  $query = $pdo->prepare($sql); //se prepara la conexion pasando como parametro la consulta sql
  $query->execute(); //se ejecuta la consulta
  $resultados = $query->fetch(); //se asocia el resultado y se obtiene un array con este
  $totalActivos = $resultados[0]; //La posicion 0 contiene el resultado debido a que es solo 1 fila, trae el numero de usuarios activos devuelto por la consulta.

  //Contar numero de usuarios inactivos
  //Sabiendo que tenemos el numero total de usuarios Se resta el numero de usuarios total menos el numero de usuarios activos y obtenemos el numero de usuarios inactivos
  $totalInactivos = $numberUsers - $totalActivos;


?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="../js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <form method="post" action="">
    <div class="row">
      <table width="100%">
        <thead>
          <tr>
            <th><strong><center>Ejercicio 1</center></strong></th>
          </tr>
        </thead>
      </table>
      <div class="large-9 columns">
        <center>
        <h3>Contando datos</h3>
        <hr>
        <table width="100%">
        <thead>
          <tr>
            <th style="background-color: #AEFAAA"><strong><center>Totales</center></strong></th>
          </tr>
        </thead>
      </table>
        </center>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                <table>
                <thead>
                  <tr>
                    <th width="200">Usuarios</th>
                    <th width="250">Tipos</th>
                    <th width="250">Status</th>
                    <th width="250">Accesos</th>
                    <th width="250">Usuarios Activos</th>
                    <th width="250">Usuarios Inactivos</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $numberUsers; //imprimir datos?></td>
                    <td><?php echo $totalTypes; ?></td>
                    <td><?php echo $totalStatus; ?></td>
                    <td><?php echo $totalLog; ?></td>
                    <td><?php echo $totalActivos; ?></td>
                    <td><?php echo $totalInactivos; ?></td>
                  </tr>
                </tbody>
              </table>
              <hr>
              <center><h3>Informacion de tabla: user</h3>
              <table width="100%">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Status_id</th>
                    <th>User_type_id</th>
                  </tr>
                </thead>
              <tbody>
              <?php
                //Tablas con informacion

                //Obtener informacion de usuarios
                $sql = "SELECT * FROM user"; //Consulta sql que devolvera la informacion de todos los usuarios
                $query = $pdo->prepare($sql); //se prepara la conexion pasando como parametro la consulta sql
                $query->execute(); //se ejecuta la consulta
                while($fila = $query->fetch()){//Se asocia cada fila devuelta por la consulta para mostrar su informacion
                  //Se muestra la informacion del array asociativo fila, contiene la informacion de cada usuario
                  echo "<tr>";
                  echo "<td>".$fila["id"]."</td>";
                  echo "<td>".$fila["email"]."</td>";
                  echo "<td>".$fila["password"]."</td>";
                  echo "<td>".$fila["status_id"]."</td>";
                  echo "<td>".$fila["user_type_id"]."</td>";
                  echo "</tr>";

                }

              ?>
              </tbody>
              </table>


              <hr>
              <center><h3>Informacion de tabla: user_log</h3>
              <table width="100%">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Date_logged</th>
                    <th>User_id</th>
                  </tr>
                </thead>
              <tbody>
              <?php
                //Obtener informacion de user_log
                $sql = "SELECT * FROM user_log"; //Consulta sql que devolvera la informacion de todos los accesos
                $query = $pdo->prepare($sql); //se prepara la conexion pasando como parametro la consulta sql
                $query->execute(); //se ejecuta la consulta
                while($fila = $query->fetch()){//Se asocia cada fila devuelta por la consulta para mostrar su informacion
                  //Se muestra la informacion del array asociativo fila, contiene la informacion de cada acceso
                  echo "<tr>";
                  echo "<td>".$fila["id"]."</td>";
                  echo "<td>".$fila["date_logged_in"]."</td>";
                  echo "<td>".$fila["user_id"]."</td>";
                  echo "</tr>";
                }

              ?>
              </tbody>
              </table>

              <hr>
              <center><h3>Informacion de tabla: user_type</h3>
              <table width="100%">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                  </tr>
                </thead>
              <tbody>
              <?php
                //Obtener informacion de user_type
                $sql = "SELECT * FROM user_type"; //Consulta sql que devolvera la informacion de todos los tipos de usuarios que existen en la bd
                $query = $pdo->prepare($sql); //se prepara la conexion pasando como parametro la consulta sql
                $query->execute(); //se ejecuta la consulta
                while($fila = $query->fetch()){//Se asocia cada fila devuelta por la consulta para mostrar su informacion
                  //Se muestra la informacion del array asociativo fila, contiene la informacion de cada tipo de usuario
                  echo "<tr>";
                  echo "<td>".$fila["id"]."</td>";
                  echo "<td>".$fila["name"]."</td>";
                  echo "</tr>";
                }

              ?>
              </tbody>
              </table>


              <hr>
              <center><h3>Informacion de tabla: status</h3>
              <table width="100%">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                  </tr>
                </thead>
              <tbody>
              <?php
                //Obtener informacion de status
                $sql = "SELECT * FROM status"; //Consulta sql que devolvera la informacion de todos los status que existen en la bd
                $query = $pdo->prepare($sql); //se prepara la conexion pasando como parametro la consulta sql
                $query->execute(); //se ejecuta la consulta
                while($fila = $query->fetch()){//Se asocia cada fila devuelta por la consulta para mostrar su informacion
                  //Se muestra la informacion del array asociativo fila, contiene la informacion de cada status registrado en la bd
                  echo "<tr>";
                  echo "<td>".$fila["id"]."</td>";
                  echo "<td>".$fila["name"]."</td>";
                  echo "</tr>";
                }
              ?>
              </tbody>
              </table>
              
              </div>
            </div>
          </section>
        </div>
      </div>

    </div>
    </form>
    <script type="text/javascript">
      function confirmAction(){
        var conf = confirm("Se eliminara el usuario, desea continuar?");
        if(!conf)
          event.preventDefault();
      }
    </script>

    <?php require_once('footer.php'); ?>