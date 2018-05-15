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
  require_once('./db/database_utilities.php');//se importa el archivo.php que contiene las funciones requeridas para trabajar con la bd
  //Inicializacion de variables tomandolas del array GET
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $type = isset($_GET['type']) ? $_GET['type'] : ''; //la variable type representa la tabla o tipo del registro (usuario o producto)
  $reg=null; 
  if(!verifyReg($id,$type)){ //se verifica que exista el registro en la bd, de no ser asi se muestra un mensaje de NO EXISTE USUARIO
      $reg = get_reg($id, $_GET['type']); //Si existe el registro se toma su informacion para mostrarla en los controles
  }

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detalle de venta</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <?php 
      require_once('header.php');
        
    ?>
     <form method="post" action="">
    <div class="row">
      <div >
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'reportes.php'" class="button radius tiny secondary">
        <h3>Detalle de venta con folio <strong><?php if($reg) echo $id; ?></strong></h3>
        <hr>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                <?php if($reg) {
                    $infoReg = $reg->fetch();
              ?>
                <table width="100%">
                  <thead>
                    <tr>
                      <td>Id de producto</td>
                      <td>Nombre de producto</td>
                      <td>Cantidad</td>
                      <td>Promedio por unidad</td>
                      <td>Importe</td>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      
                      //Crear consulta y obtener productos de la venta
                      $sql2 = "select * from venta_producto as vp inner join venta as v on v.id = vp.folio_venta inner join producto as p on p.id = vp.id_producto where v.id=$id";
                      $query2 = $pdo->prepare($sql2); //se prepara la consulta
                      $query2->execute(); //se ejecuta la consulta
                      while($fila=$query2->fetch()){
                        //Imprimir informacion de detalle de la venta
                        echo "<tr>";
                        echo "<td>".$fila['id_producto']."</td>";
                        echo "<td>".$fila['nombre']."</td>";
                        echo "<td>".$fila['cantidad']."</td>";
                        echo "<td>".$fila['precio_venta']."</td>";
                        echo "<td>".$fila['importe']."</td>";
                        echo "</tr>";

                      }


                    ?>
                  </tbody>
              </table>
              <center><h2>Monto total: $ <?php echo $infoReg['monto']; ?></h2></center>
              <?php }else{
                echo "<h1>EL REGISTRO NO EXISTE</h1>";
              } ?>
              </div>
            </div>
          </section>
        </div>
      </div>

    </div>
    </form>
    <script type="text/javascript">
      function confirmAction(){
        var conf = confirm("Los datos seran actualizados, desea continuar?");
        if(!conf)
          event.preventDefault();
      }
    </script>
    

    <?php require_once('footer.php'); ?>