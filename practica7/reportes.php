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

                  
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reportes</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
      <div>
        <h3>Reporte de venta</h3>
        <input type="button" name="btn_back" value="Volver al Menu" onclick="window.location = 'index.php'" class="button tiny secondary">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
                  <form method="post" action="">
              <table width="100%">
                <thead>
                  <tr>
                    <td>Seleccione la fecha y de clic en filtrar</td>
                    <td></td>
                    <td></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input type="date" name="fecha"></td>
                    <td><center><input type="submit" name="aceptar" value="Filtrar" class="button tiny success"></td>
                      <td><center><input type="submit" name="aceptar2" value="Ver todas las ventas" class="button tiny success"></td>
                  </tr>
                </tbody>
              </table>
              <hr>
              <h3>Resultado de busqueda</h3>
              <table width="100%">
                <thead>
                  <tr>
                    <td>Folio de venta</td>
                    <td>Monto</td>
                    <td>Fecha</td>
                    <td></td>
                  </tr>
                </thead>

                <tbody>
              <?php
                if(isset($_POST)){
                  //Realizar filtro de ventas por la fecha ingresada
                    //se crea la consulta

                    if(isset($_POST['aceptar'])){
                        $sql = "SELECT * FROM venta WHERE fecha='".$_POST['fecha']."'";
                        $sql2 = "SELECT SUM(monto) FROM venta WHERE fecha='".$_POST['fecha']."'";
                    }else{
                      $sql = "SELECT * FROM venta";
                      $sql2 = "SELECT SUM(monto) FROM venta";
                    }
                    
                    
                    $query = $pdo->prepare($sql); //se prepara la consulta
                    $query->execute();//se ejecuta la consulta
                    while($fila = $query->fetch()){
                        echo "<tr>";
                        echo "<td>".$fila['id']."</td>";
                        echo "<td> $ ".$fila['monto']."</td>";
                        echo "<td>".$fila['fecha']."</td>";
                       echo "<td><a href='./detalle_venta.php?id=". $fila['id'] . "&type=venta' class='button radius tiny secondary'>Ver detalles</a></td>";
                       echo "</tr>";
                    }

                    
                    $query2=$pdo->prepare($sql2);
                    $query2->execute();
                    $total_q = $query2->fetch();
                    echo "<h3 style='text-align: right;font-weight: bold;'>Monto total del filtro seleccionado: $ ".$total_q[0]."</h3>";


                }
               
  


              ?>
              </tbody>
              </table>
                 </form>
            </div>
          </section>
        </div>
      </div>

    </div>

    <?php require_once('footer.php'); ?>