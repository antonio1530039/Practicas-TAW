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
        require_once('../db/database_utilities.php');
        if(isset($_POST["btn_add"])){
          if(verifyUser($_POST['id'],"futbolistas")){
            if(addUser(htmlspecialchars($_POST['id']), htmlspecialchars($_POST['nombre']),htmlspecialchars($_POST['posicion']), htmlspecialchars($_POST['carrera']), htmlspecialchars($_POST['email']),"futbolistas"))
              header("Location: futbolistas.php");
            else
              echo "<script>alert('Error al registrar!');</script>";
          }else{
            echo "<script>alert('Ya existe un usuario con ese ID (numero de dorso) por favor ingresa uno diferente');</script>";
          }
        }
    ?>
     <form method="post" action="">
    <div class="row">
      <div class="large-9 columns">
        <h3>Alta de futbolista</h3>
        <p>Ingrese los datos que se piden a continuacion</p>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'futbolistas.php'" class="button radius tiny secondary">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                <p><label>ID(numero de dorso): </label>
                  <input type="text" name="id" required="" placeholder="Numero" required="">
                </p>
                <p><label>Nombre: </label>
                  <input type="text" name="nombre" required="" placeholder="Nombre" required="">
                </p>
                <p><label>Posicion: </label>
                  <input type="text" name="posicion" required="" placeholder="Posicion" required="">
                </p>
                  <label>Carrera: </label>
                  <input type="text" name="carrera" required="" placeholder="Carrera" required="">
                <p><label>Email: </label>
                  <input type="email" name="email" required="" placeholder="email" required="">
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