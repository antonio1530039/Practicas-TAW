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
  require_once('./db/database_utilities.php');//se importa el archivo.php que contiene las funciones requeridas para trabajar con la bd
  //Inicializacion de variables tomandolas del array GET
  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $type = isset($_GET['type']) ? $_GET['type'] : ''; //la variable type representa la tabla o tipo del registro (usuario o producto)
  $reg=null; 
  if(!verifyReg($id,$type)){ //se verifica que exista el registro en la bd, de no ser asi se muestra un mensaje de NO EXISTE USUARIO
      $reg = get_reg($id, $_GET['type']); //Si existe el registro se toma su informacion para mostrarla en los controles
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
      if(isset($_POST['btn_add']) && $type=='usuario'){
            if(updateUser($id, $_POST['username']))
              header("Location: $type"."s.php");
            else
              echo "<script>alert('Error al registrar!');</script>";
      }else if(isset($_POST['btn_add']) && $type=='producto'){
        echo $_POST['precio'];
            if(updateProduct($id, $_POST['nombre'], $_POST['precio']))
              header("Location: $type"."s.php");
            else
              echo "<script>alert('Error al registrar!');</script>";
      }

        
    ?>
     <form method="post" action="">
    <div class="row">
      <div class="large-9 columns">
        <h3>Actualizacion de registro</h3>
        <p>Realice las modificaciones correspondientes</p>
        <input type="button" name="btn_back" value="Regresar al menu" onclick="window.location = 'index.php'" class="button radius tiny secondary">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              <?php if($reg) {


                    if($type=='usuario'){
                      $infoUser = $reg->fetch(); //se asocia el array devuelto si encontro resultados para posteriormente mostrar la informacion del usuario en los controles
              ?>
                <p><label>ID de usuario: </label>
                  <input type="text" name="id" required="" placeholder="Numero" value="<?php echo $infoUser['id']; ?>" readonly="true">
                </p>
                <p><label>Username: </label>
                  <input type="text" name="username" required="" placeholder="Username" value="<?php echo $infoUser['username']; ?>">
                </p>
                <p><label>Password: </label>
                  <input type="text" name="password" required="" placeholder="Password" value="<?php echo $infoUser['password']; ?>" readonly="true">
                </p>
                <?php
                  }
                  if($type=='producto'){
                      $infoProduct = $reg->fetch();

                  ?>
                  <p><label>ID de producto: </label>
                  <input type="text" name="id" required="" placeholder="ID de producto" value="<?php echo $infoProduct['id']; ?>" readonly="true">
                </p>
                <p><label>Nombre: </label>
                  <input type="text" name="nombre" required="" placeholder="Nombre" value="<?php echo $infoProduct['nombre']; ?>">
                </p>
                <p><label>Precio unitario: </label>
                  <input type="number" step='0.00001' name="precio" required="" placeholder="Precio unitario" value="<?php echo $infoProduct['precio_unitario']; ?>">

                </p>
                  <?php
                  }
                ?>
                <p>
                  <input type="submit" name="btn_add" value="Guardar" class="button radius tiny success" onclick="confirmAction();">
                </p>
              <?php }else{
                echo "<h1>EL REGISTRO NO EXISTE</h1>";
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