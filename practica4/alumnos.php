<?php
include_once('utilities.php');
$total_users = count($alumnos)-1; //Se resta uno debido a que la posicion 0 en el array es solo para inicializar y esta no contiene nada
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alumnos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <?php
      if(isset($_POST["btn_agregar"]))
        header("Location: alta_alumno.php");
    ?>
    <form method="post" action="" >
    <div class="row">
      <div class="large-9 columns">
        <h3>Gestión de Alumnos</h3>
          <p>Listado de alumnos registrados</p>
          <input type="submit" name="btn_agregar" value="Registrar alumno" class="button">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($total_users > 0){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">Matricula</th>
                    <th width="250">Nombre</th>
                    <th width="250">Carrera</th>
                    <th width="250">Correo</th>
                    <th width="250">Telefono</th>
                    <th width="250">Accion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php for($i=1; $i<count($alumnos); $i++){ //Para cada posicion del array alumnos se imprimen sus propiedades (empieza en 1 porque la pos 0 es solo de inicializacion y no tiene nada)?>
                  <tr>
                    <td><?php echo $alumnos[$i]['matricula'] ?></td>
                    <td><?php echo $alumnos[$i]['nombre'] ?></td>
                    <td><?php echo $alumnos[$i]['carrera'] ?></td>
                    <td><?php echo $alumnos[$i]['correo'] ?></td>
                    <td><?php echo $alumnos[$i]['telefono'] ?></td>
                    <td><a href="./key.php?id=<?php echo $i; ?>&action=alumnos" class="button radius tiny secondary">Ver detalles</a></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $total_users; ?></td>
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
    </form>

    <?php require_once('footer.php'); ?>