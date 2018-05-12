
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="../css/foundation.css" />
    <script src="../js/vendor/modernizr.js"></script>
  </head>
  <body>
    
    <?php require_once('header.php'); ?>

    <form method="post" action="">
    <div class="row">
      <table width="100%">
        <thead>
          <tr>
            <th><strong><center>Ejercicio 2</center></strong></th>
          </tr>
        </thead>
      </table> 
      <center>
      <input type="button" name="btn_back" value="Gestion de Futbolistas" onclick="window.location = 'futbolistas.php'" class="button success">
      <input type="button" name="btn_back" value="Gestion de Basquetbolistas" onclick="window.location = 'basquetbolistas.php'" class="button success">
    </div>
    </form>

    <?php require_once('footer.php'); ?>