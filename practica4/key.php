<?php
include_once('utilities.php');
$id = isset( $_GET['id'] ) ? $_GET['id'] : ''; //Se obtienen los parametros con GET
$who = isset($_GET['action']) ? $_GET['action'] : ''; //Se obtienen los parametros con GET
if($who=='maestros'){
    if( !array_key_exists($id, $maestros) || $id=="0") //se verifica que no sea 0, debido a que no contiene nada
    {
      die('No existe dicho usuario');
    }
}else if($who=='alumnos'){
  if( !array_key_exists($id, $alumnos) || $id=="0" )//se verifica que no sea 0, debido a que no contiene nada
    {
      die('No existe dicho usuario');
    }
}

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curso PHP |  Bienvenidos</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <div class="row">
 
      <div class="large-9 columns">
        <h3>Manejo de arreglos</h3>
          <p>Elemento de un arreglo</p>
        <?php if($who=='maestros'){ ?>
          <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'maestros.php'" class="button">
        <?php } else { ?>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'alumnos.php'" class="button">
        <?php }?>

        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <ul class="pricing-table">
                <li class="title">Detalle de indice</li>
                <?php if($who=='maestros') { //Se verifica si es un alumno o un maestro?>
                <li class="description"><?php echo $maestros[$id]['numero'] ?></li>
                <li class="description"><?php echo $maestros[$id]['nombre'] ?></li>
                <li class="description"><?php echo $maestros[$id]['carrera'] ?></li>
                <li class="description"><?php echo $maestros[$id]['telefono'] ?></li>
                <?php }else{ ?>
                <li class="description"><?php echo $alumnos[$id]['matricula'] ?></li>
                <li class="description"><?php echo $alumnos[$id]['nombre'] ?></li>
                <li class="description"><?php echo $alumnos[$id]['carrera'] ?></li>
                <li class="description"><?php echo $alumnos[$id]['correo'] ?></li>
                <li class="description"><?php echo $alumnos[$id]['telefono'] ?></li>
                <?php } ?>
              </ul>
            </div>
          </section>
        </div>
      </div>
    </div>
     
    <?php require_once('footer.php'); ?>