<?php
  require_once('../db/database_utilities.php');//se importa el archivo.php que contiene las funciones requeridas para trabajar con la bd
  //Inicializacion de variables tomandolas del array GET
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $type = isset($_GET['type']) ? $_GET['type'] : '';
  $user=null; 
  if(!verifyUser($id,$type)){ //se verifica que exista el usuario en la bd, de no ser asi se muestra un mensaje de NO EXISTE USUARIO
      $user = get_user($id, $_GET['type']); //Si existe el usuario se toma su informacion para mostrarla en los controles
  }

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Actualizacion de registro</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <?php 
      require_once('header.php');
      if(isset($_POST['btn_add'])){
            if(update(htmlspecialchars($_POST['id']), htmlspecialchars($_POST['nombre']),htmlspecialchars($_POST['posicion']), htmlspecialchars($_POST['carrera']), htmlspecialchars($_POST['email']),$type))
              header("Location: $type.php");
            else
              echo "<script>alert('Error al registrar!');</script>";
      }

        
    ?>
     <form method="post" action="">
    <div class="row">
      <div class="large-9 columns">
        <h3>Actualizacion de registro</h3>
        <p>Realice las modificaciones correspondientes, usted esta modificando un usuario de tipo <?php if($user) echo $type ?></p>
        <input type="button" name="btn_back" value="Regresar al menu" onclick="window.location = 'index.php'" class="button radius tiny secondary">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              <?php if($user) {
                $info = $user->fetch(); //se asocia el array devuelto si encontro resultados para posteriormente mostrar la informacion del usuario en los controles
              ?>
                <p><label>ID(numero de dorso): </label>
                  <input type="text" name="id" required="" placeholder="Numero" value="<?php echo $info['id']; ?>" readonly="true">
                </p>
                <p><label>Nombre: </label>
                  <input type="text" name="nombre" required="" placeholder="Nombre" value="<?php echo $info['nombre']; ?>">
                </p>
                <p><label>Posicion: </label>
                  <input type="text" name="posicion" required="" placeholder="Posicion" value="<?php echo $info['posicion']; ?>">
                </p>
                  <label>Carrera: </label>
                  <input type="text" name="carrera" required="" placeholder="Carrera" value="<?php echo $info['carrera']; ?>">
                <p><label>Email: </label>
                  <input type="email" name="email" required="" placeholder="email" value="<?php echo $info['email']; ?>">
                </p>
                <p>
                  <input type="submit" name="btn_add" value="Guardar" class="button radius tiny success" onclick="confirmAction();">
                </p>
              <?php }else{
                echo "<h1>EL USUARIO NO EXISTE</h1>";
              } ?>
              </div>
            </div>
          </section>
        </div>
      </div>

    </div>
    </form>
    <script type="text/javascript">
      function confirmAction(){
        var conf = confirm("Los datos seran actualizados, desea continuar?");
        if(!conf)
          event.preventDefault();
      }
    </script>
    

    <?php require_once('footer.php'); ?>