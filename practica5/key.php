<?php
  require_once("database_utilities.php");
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $user = get_user($id);
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alta de usuario</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <?php 
      require_once('header.php');
      if(isset($_POST['btn_add'])){
          if(update_user($id, htmlspecialchars($_POST['nombre']), htmlspecialchars($_POST['correo'])))
              header("Location: index.php");
          else
            echo "<script>alert('Error al actualizar!');</script>";
      }

        
    ?>
     <form method="post" action="">
    <div class="row">
      <div class="large-9 columns">
        <h3>Actualizacion de usuario</h3>
        <p>Ingrese los datos que se piden a continuacion</p>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'index.php'" class="button radius tiny secondary">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              <?php if($user) {
                $info = $user->fetch_assoc();
              ?>
                <p><label>Nombre: </label>
                  <input type="text" name="nombre" required="" placeholder="Nombre" required="" value="<?php echo $info['nombre']?>">
                </p>
                <p><label>Correo: </label>
                  <input type="email" name="correo" required="" placeholder="Correo" required="" value="<?php echo $info['correo']?>">
                </p>
                <p>
                  <input type="submit" name="btn_add" value="Guardar" class="button radius tiny success">
                </p>
              <?php } ?>
              </div>
            </div>
          </section>
        </div>
      </div>

    </div>
    </form>
    

    <?php require_once('footer.php'); ?>