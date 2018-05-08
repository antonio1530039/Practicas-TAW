<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alta de maestro</title>
    <link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>
    <?php 
 	//Boton agregar 
    if(isset($_POST["btn_add"])){
    	//Se usa la funcion fopen y se manda como parametros la ubicacion del archivo y a, esto para poder realizar una escritura en este de tipo agregar, no remplaza, solo agrega. Se verifica si se pudo realizar la conexion con el archivo tambien.
      $f = fopen("./databases/maestros.txt", 'a') or die("can't open file");
      //Se crea la cadena que se insertara, seran los valores de los controles filtrados con la funcion htmlspecialchars para que en caso de ingresar code html se tome como cadena y se separan por , los valores.
      $content = htmlspecialchars($_POST["nEmpleado"]) . ",".
                  htmlspecialchars($_POST["nombre"]) . ",".
                  htmlspecialchars($_POST["carrera"]) . ",".
                  htmlspecialchars($_POST["telefono"]).",\n";
      fwrite($f, $content); //Se realiza la agregacion de la cadena anterior
      fclose($f); //se cierra la conexion con el archivo
      echo "<script>alert('El maestro fue registrado exitosamente');</script>";
    }
    ?>

     <form method="post" action="">
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Alta de maestro</h3>
        <p>Ingrese los datos que se piden a continuacion</p>
        <input type="button" name="btn_back" value="Regresar" onclick="window.location = 'maestros.php'" class="button">
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <div class="row">
                <p>
                  <input type="text" name="nEmpleado" required="" placeholder="Numero de Empleado">
                </p>
                <p>
                  <input type="text" name="nombre" required="" placeholder="Nombre">
                </p>
                <p>
                  <select name="carrera">
                    <option value="Ing. Tecnologias de la Informacion">Ing. Tecnologias de la Informacion</option>
                    <option value="Ing. en Manufactura">Ing. en Manufactura</option>
                    <option value="Ing. en Mecatronica">Ing. en Mecatronica</option>
                    <option value="Ing. en Sistemas Automotrices">Ing. en Sistemas Automotrices</option>
                    <option value="PyMES">PyMES</option>
                  </select>
                </p>
                <p>
                  <input type="text" name="telefono" required="" placeholder="Telefono">
                </p>
                <p>
                  <input type="submit" name="btn_add" value="Registrar" class="button">
                </p>
              </div>
            </div>
          </section>
        </div>
      </div>

    </div>
    </form>
    

    <?php require_once('footer.php'); ?>