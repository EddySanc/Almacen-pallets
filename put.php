<?php
  session_start();
  if(!isset($_SESSION['id']))
  {
    header('Location: index.php');
    exit;
  }else
  {

  

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link href="./css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery-3.2.1.js"></script>
<script src="./js/bootstrap.min.js"></script>
  <script defer src="./js/all.js"></script>

    <title>DHL Procesos</title>

   
  </head>
  <body class="container">
 

 	<?php
 		
 		include "php/barra.php";
 	?>
<hr>

<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>PUTAWAY</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


 		




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
  </body>
</html>

<?php
}
?>