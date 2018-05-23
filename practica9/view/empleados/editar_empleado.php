<?php
  //se crea la instancia del controlador
  $controller_empleados = new MVC();
  
  //se  ejecuta el metodo actualizarMaestroController
  $controller_empleados->actualizarMaestroController();

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modificacion de empleados</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <form method="post">
    <div class="row">
      <div>
        <h3>Modificacion de empleado</h3>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'index.php?action=empleados'" class="button tiny success" style="float: right;">
        <hr>
      </div>
        <div>
              <?php
                //se ejecuta el metodo getEmpleadoController para mostrar los datos
                  $controller_empleados->getEmpleadoController();

              ?>
               <input type='submit' name='btn_actualizar' value='Guardar' class='button tiny success' style='float: right;' onclick="confirmar();">
            
            <!--content !-->
        </div>
      </div>
    </div>
    </form>
  </body>
  <script>
        function confirmar(){
          var x = confirm("Seguro que deseas guardar los datos?");
          if(!x)
            event.preventDefault();
        }

      </script>
  </html>
