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

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Practica 7</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

     
    <div class="row">
      <center>
      <div>
          <h2>Practica 7</h2>
          <h2>Bienvenido: <?php if(isset($_SESSION['login'])) echo $_SESSION['login'];?></h2>
          <p>Menú de opciones</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <input type="button" value="Gestion de usuarios" onclick="window.location = 'usuarios.php'" class="button success">
              <input type="button" value="Gestion de productos" onclick="window.location = 'productos.php'" class="button success">
              <input type="button" value="Realizar venta" onclick="window.location = 'venta.php'" class="button success">
              <input type="button" value="Ver reportes de ventas" onclick="window.location = 'reportes.php'" class="button success">
            </div>
          </section>
        </div>
      </div>
    </center>

    </div>
    <?php require_once('footer.php'); ?>