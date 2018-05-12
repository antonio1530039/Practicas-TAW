
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Practica 6</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

     
    <div class="row">
      <center>
      <div>
          <h2>Practica 6</h2>
          <p>Menú de opciones</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <input type="button" value="Ejercicio 1" onclick="window.location = './ejercicio1/index.php'" class="button tiny success">
              <input type="button" value="Ejercicio 2" onclick="window.location = './ejercicio2/index.php'" class="button tiny success">
            </div>
          </section>
        </div>
      </div>
    </center>

    </div>
    <?php require_once('footer.php'); ?>