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
    
    <?php require_once('header.php'); ?>
    <?php
        require_once('database_utilities.php');
        if(isset($_POST["btn_add"])){
            if(add(htmlspecialchars($_POST['nombre']), htmlspecialchars($_POST['correo'])))
              header("Location: index.php");
            else
              echo "<script>alert('Error al registrar!');</script>";
        }
    ?>
     <form method="post" action="">
    <div class="row">
      <div class="large-9 columns">
        <h3>Alta de usuario</h3>
        <p>Ingrese los datos que se piden a continuacion</p>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'index.php'" class="button radius tiny secondary">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                <p><label>Nombre: </label>
                  <input type="text" name="nombre" required="" placeholder="Nombre" required="">
                </p>
                <p><label>Correo: </label>
                  <input type="email" name="correo" required="" placeholder="Correo" required="">
                </p>
                <p>
                  <input type="submit" name="btn_add" value="Registrar" class="button tiny success">
                </p>
              </div>
            </div>
          </section>
        </div>
      </div>

    </div>
    </form>
    

    <?php require_once('footer.php'); ?>