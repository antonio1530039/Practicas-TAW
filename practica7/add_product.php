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
    <title>Alta de producto</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>
    <?php
        require_once('./db/database_utilities.php');
        if(isset($_POST["btn_add"])){
          if(addProduct($_POST['nombre'], $_POST['precio']))
              header("Location: productos.php");
            else
              echo "<script>alert('Error al registrar!');</script>";
        }

    ?>
     <form method="post" action="">
    <div class="row">
      <div class="large-9 columns">
        <h3>Registro de producto</h3>
        <p>Ingrese los datos que se piden a continuacion</p>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'productos.php'" class="button radius tiny secondary">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                <p><label>Nombre del producto: </label>
                  <input type="text" name="nombre" required="" placeholder="Nombre" required="">
                </p>
                <p><label>Precio unitario: </label>
                  <input type="number" step='0.00001' name="precio" required="" placeholder="Precio unitario" required="">
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