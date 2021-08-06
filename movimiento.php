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
  <strong>Movimientos</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


<form>
  
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">No. de IS</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="# de IS">
    </div>
  </div>
  
  <div class="form-group row">
    <div class="col-sm-2">Fecha</div>
        <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="# de IS">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary float-right ml-1">Buscar</button>
    </div>
  </div>
</form>


    
  <table class="table">
    <thead>
      <tr>
        <th>Tipo</th>
        <th>Nombre</th>
        <th>Correo</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Default</td>
        <td>Defaultson</td>
        <td>def@somemail.com</td>
      </tr>      
      <tr class="table-primary">
        <td>Primary</td>
        <td>Joe</td>
        <td>joe@example.com</td>
      </tr>
      <tr class="table-success">
        <td>Success</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr class="table-danger">
        <td>Danger</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr class="table-info">
        <td>Info</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
      <tr class="table-warning">
        <td>Warning</td>
        <td>Refs</td>
        <td>bo@example.com</td>
      </tr>
      <tr class="table-active">
        <td>Active</td>
        <td>Activeson</td>
        <td>act@example.com</td>
      </tr>
      <tr class="table-secondary">
        <td>Secondary</td>
        <td>Secondson</td>
        <td>sec@example.com</td>
      </tr>
      <tr class="table-light">
        <td>Light</td>
        <td>Angie</td>
        <td>angie@example.com</td>
      </tr>
      <tr class="table-dark text-dark">
        <td>Dark</td>
        <td>Bo</td>
        <td>bo@example.com</td>
      </tr>
    </tbody>
  </table>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
  </body>
</html>

<?php
}
?>