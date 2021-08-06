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

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>STAGE</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


    <form  method="POST" action="php/altaStage.php">
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault01">IS</label>
      <input type="number" class="form-control" id="is" name="is" placeholder="No. de IS" required>
    </div>

    <div class="col-md-12 mb-3">
      <label for="validationDefault01">Mesa</label>
      <input type="number" class="form-control" id="mesa" name="mesa" placeholder="No. de Mesa" required>
    </div>

    <div cla
    <div class="col-md-12 mb-3">
      <label for="validationDefault01">Stage</label>
      <input type="text" class="form-control" id="stage" name="stage" placeholder="No. de Stage" required>
    </div>
    <div class="col-md-12 mb-3">
      <label for="validationDefault02">Usuario</label>
      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="No. de Usuario" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-12 mb-3">
      <label for="validationDefault03">Pallet</label>
      <input type="text" class="form-control" id="pallet" name="pallet" placeholder="No. de Pallet" required>
    </div>
    <div class="col-md-12 mb-3">
      <label for="validationDefault04">Fecha</label>
           <input type="text" class="form-control" id="fecha" name="fecha" placeholder="Fecha del WMS">
    </div>
 </div>
  <button class="btn btn-danger" name="insertarStage"  type="submit">Registrar</button>
</form>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
</html>

<?php
}
?>