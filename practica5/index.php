<?php
require_once('database_utilities.php');
//$user_access = [];
$users = run_query();
?>
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

     
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Usuarios registrados</h3>
          <p>Listado</p>
        <input type="button" name="btn_back" value="Registrar usuario" onclick="window.location = 'add_user.php'" class="button tiny success">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
              </div>
              <?php if($users){ ?>
              <table>
                <thead>
                  <tr>
                    <th width="200">ID</th>
                    <th width="250">Nombre</th>
                    <th width="250">Correo</th>
                    <th width="250"></th>
                    <th width="250"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach( $users as $id => $user ){ ?>
                  <tr>
                    <td><?php echo $user['id'] ?></td>
                    <td><?php echo $user['nombre'] ?></td>
                    <td><?php echo $user['correo'] ?></td>
                    <td><a href="./key.php?id=<?php echo $user['id']; ?>" class="button radius tiny secondary">Ver detalles</a></td>
                    <td><a href="./delete.php?id=<?php echo $user['id']; ?>" class="button radius tiny alert" onclick='confirmAction();'>Eliminar</a></td>
                  </tr>
                  <?php } ?>
                  <tr>
                    <td colspan="4"><b>Total de registros: </b> <?php echo $users->num_rows; ?></td>
                  </tr>
                </tbody>
              </table>
              <?php }else{ ?>
              No hay registros
              <?php } ?>
            </div>
          </section>
        </div>
      </div>

    </div>
    <script type="text/javascript">
      function confirmAction(){
        var conf = confirm("Se eliminara el usuario, desea continuar?");
        if(!conf)
          event.preventDefault();
      }
    </script>

    <?php require_once('footer.php'); ?>