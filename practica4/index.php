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
    <?php
      if(isset($_POST["btn_alumnos"]))
        header("Location: alumnos.php");
      if(isset($_POST["btn_maestros"]))
        header("Location: maestros.php");
    ?>

     
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Menu de opciones</h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <form method="post" action="">
                <center>
                <p>
                  <input type="submit" class="button" name="btn_alumnos" value="Gestion de alumnos">
                </p>
                <p>
                  <input type="submit" class="button" name="btn_maestros" value="Gestion de maestros">
                </p>
                </center>
              </form>
            </div>
          </section>
        </div>
      </div>

    </div>
    

    <?php require_once('footer.php'); ?>