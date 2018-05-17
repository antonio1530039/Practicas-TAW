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
<div class="row">
      <div class="large-3 columns">
        <h1><img src="./img/logo.png"/ width="100" height="100"></h1>
      </div>
      <div class="large-9 columns">
        <ul class="right button-group">
          <li><a href="./index.php" style="background-color:purple" class="button">Inicio</a></li>
          <?php
          if(!empty($_SESSION["login"])){ //se verifica que el usuario este logueado
              
          ?>
          <li><a href="./logout.php" style="background-color:red" class="button">Cerrar sesion</a></li>

          <?php

        }?>
        </ul>
      </div>
    </div>