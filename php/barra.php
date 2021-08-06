<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">
   <img src="img/dhl.png" alt="Logo" style="width:40px;">
   </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>





  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">

        <a class="nav-link" href="recibo.php"><i class="fas fa-file"></i> Recibo</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="stage.php"><i class="fas fa-box-open"></i>  Stage</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="mesa.php"><i class="fas fa-people-carry"></i> Mesa</a>
      </li>

	  <li class="nav-item">
        <a class="nav-link" href="put.php"><i class="fas fa-archive"></i>  Put away</a>
      </li>

     <li class="nav-item">
        <a class="nav-link" href="movimiento.php"><i class="fas fa-people-carry"></i>  Movimiento de Proceso</a>
      </li>

           <li class="nav-item">
        <a class="nav-link " data-toggle="modal" data-target="#myModal" href="#"><i class="fas fa-cloud-upload-alt"></i>  Subir Archivo por Día</a>
      </li>

       <li class="nav-item">
        <a class="nav-link " href="cerrar.php"><i class="fas fa-sign-out-alt"></i>  Cerrar Sesión</a>
      </li>


    </ul>

  </div>
</nav>


<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Subir Archivo</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <form class="form-inline" enctype="multipart/form-data" id="myform" method="POST" action="./php/subirIndbound.php">
               
                <input type="file" class="form-control mb-2 mr-sm-2" id="file" name="file" accept="application/vnd.ms-Excel" required>
                <input type="submit"  value="Subir Excel"  id="but_upload" class="btn btn-primary mb-2">
              </form>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>