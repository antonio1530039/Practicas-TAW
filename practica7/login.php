<?php
  session_start();
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>
    <?php
        require_once('./db/database_utilities.php');

        if(isset($_POST['btn_add'])){
          //Verificar login
           $safePass = md5($_POST['password']);
          $sql = "SELECT * FROM usuario WHERE username='".$_POST['username']."' and password='".$safePass."'";//Se crea la consulta que se ejecutara
          $query = $pdo->prepare($sql); //se prepara la consulta
          $query->execute(); //se ejecuta la consulta
          $result = $query->fetch();
          if($result){//si existe el registro
            $_SESSION['login'] = $_POST['username'];
            header('Location: index.php');
          }
          else{
            echo "<script>alert('El usuario ingresado no existe');</script>";
          }

        }
        

    ?>
    <Center>
     <form method="post" action="">
    <div class="row">
      <div>
        <h3>Login</h3>
        <p>Ingrese los datos que se piden a continuacion</p>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                <p>
                  <input type="text" name="username" required="" placeholder="Username" required="">
                </p>
                <p>
                  <input type="text" name="password" required="" placeholder="Password" required="">
                </p>
                <p>
                  <input type="submit" name="btn_add" value="Iniciar sesion" class="button tiny success">
                </p>
              </div>
            </div>
          </section>
        </div>
      </div>

    </div>
    </form>
    

    <?php require_once('footer.php'); ?>