<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
	<?php include "view/header.php"; ?>
	<hr>
	<section>
	<?php
	$controllerT = new MVC();

	$controllerT->enlacePaginasController();
	?>
	</section>
	<?php include "view/footer.php"; ?>
</body>
  	<!-- SELECT2 -->
    <link href="view/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <script src="view/assets/js/jquery-2.1.4.min.js"></script>
    <script src="view/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="view/assets/pages/jquery.form-advanced.init.js"></script>
  
    <!-- DATATABLE -->
  <script src="view/assets/js/vendor/jquery.js"></script>
  <script src="view/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="view/assets/plugins/datatables/jquery.dataTables.min.css" />
  
  <script type="text/javascript">
          $(document).ready(function() {
              $('#dt').DataTable();
          });
      </script> 

</html>