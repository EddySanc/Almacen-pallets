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

   <style type="text/css">



   </style>


  </head>
  <body class="container">
 

 	<?php
 		
 		include "php/barra.php";
 	?>
<hr>



<?php

require_once("php/Conectar.php");
require_once("php/utilidades.php");

//consulta
$result = $conn->query('SELECT COUNT(*) as total_products FROM indbound where estado="En Stage In" and id not in (select indbound_id from proceso where estado=0)');
$row = $result->fetch_assoc();
$num_total_rows = $row['total_products'];


//para los que estan en proceso
$result2 = $conn->query('SELECT COUNT(*) as total_products FROM proceso where estado=0');
$row2 = $result2->fetch_assoc();
$num_total_rows2 = $row2['total_products'];


$total_pages2=0;


?>


  <div class="row">
      
      <div class="col-md-6">

        <div id="accordion">


<?php
      if ($num_total_rows > 0) 
      {
         $page = false;
          if (isset($_GET["page"])) 
          {
              $page = $_GET["page"];
          }
          
          if (!$page) 
          {
             $start = 0;
             $page = 1;
          } else 
          {
            $start = ($page - 1) * NUM_ITEMS_BY_PAGE;
          }
            //calculo el total de paginas
            $total_pages = ceil($num_total_rows / NUM_ITEMS_BY_PAGE);

            //pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra
            echo '<div class="alert alert-primary" role="alert">
                  <strong>Total de IS: '.$num_total_rows.' DISPONIBLES</strong>
                  <br>En cada pagina se muestran '.NUM_ITEMS_BY_PAGE.' IS<br>
                  Mostrando la página '.$page.' de ' .$total_pages.' páginas
                  </div>';



//where id not in (select indbound_id from proceso)
          $consulta="SELECT * from indbound where estado='En Stage In' and id not in (select indbound_id from proceso where estado=0) order by indbound.fecha_llegada asc limit ".$start.",".NUM_ITEMS_BY_PAGE;



          $result = $conn->query($consulta);

          if ($result->num_rows > 0) 
          {
                    
                while($row = $result->fetch_assoc()) 
                      {
                      

                        $buscarStage="select stage from recibo where `is`='".$row['is']."'";
                        $resultado=$conn->query($buscarStage);
                        $filaIs=$resultado->fetch_assoc();
                        $no_is=$filaIs['stage'];


                          echo '  <div class="card ">

                          <div class="card-header" id="'.$row['is'].'">
                            <h5 class="mb-0">
                              <button class="btn btn-link" data-toggle="collapse" data-target="#c'.$row['is'].'" aria-expanded="true" aria-controls="c'.$row['is'].'">
                                <h4><span class="badge badge-'.getColor(tiempo_transcurrido($row['fecha_llegada'])) .'">IS # '.$row['is'].' </span></h4>
                              </button>
                            </h5>
                          </div>

                          <div id="c'.$row['is'].'" class="collapse" aria-labelledby="'.$row['is'].'" data-parent="#accordion">
                            <div class="card-body">
                               <ul class="list-group list-group-flush">

                                <li class="list-group-item">Fecha: '.$row['fecha_llegada'].'</li>
                                <li class="list-group-item">Tipo de Envio: '.$row['tipo'].'</li>
                                <li class="list-group-item">Piezas: '.$row['unidades'].'</li>
                                <li class="list-group-item">Estado: '.$row['estado'].'</li>
                                <li class="list-group-item">Stage: '.$no_is.'</li>
                                <a class="btn btn-'.getColor(tiempo_transcurrido($row['fecha_llegada'])) .'" class="btn btn-primary" data-toggle="modal" data-target="#m'.$row['is'].'">Asignar</a>
                              </ul>
                            </div>
                          </div>
                        </div>'; 

                          generarModal($row['is'],$row['id']);
                      }
          }


      }




  


?>







         
      
<?php

   echo '<nav class="table-responsive mb-2">';
    echo '<ul class="pagination">';

    if ($total_pages > 1) 
    {
        if ($page != 1) 
        {
            echo '<li class="page-item"><a class="page-link" href="mesa.php?page='.($page-1).'&pages2=1"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for ($i=1;$i<=$total_pages;$i++) 
        {
            if ($page == $i) 
            {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page.'</a></li>';
            } else 
            {
                echo '<li class="page-item"><a class="page-link" href="mesa.php?page='.$i.'&pages2=1">'.$i.'</a></li>';
            }
        }

        if ($page != $total_pages) 
        {
            echo '<li class="page-item"><a class="page-link" href="mesa.php?page='.($page+1).'&pages2=1"><span aria-hidden="true">&raquo;</span></a></li>';
        }
    }
    echo '</ul>';
    echo '</nav>';

          ?>


          
      </div>
    </div>


<!-- aqui esta la columna 2-->
       <div class="col-md-6">

        <div id="accordion">


<?php
      if ($num_total_rows2 > 0) 
      {
         $page2 = false;
          if (isset($_GET["pages2"])) 
          {
              $page2 = $_GET["pages2"];
          }
          
          if (!$page2) 
          {
             $start = 0;
             $page2 = 1;
          } else 
          {
            $start = ($page2 - 1) * NUM_ITEMS_BY_PAGE;
          }
            //calculo el total de paginas
            $total_pages2 = ceil($num_total_rows2 / NUM_ITEMS_BY_PAGE);

            //pongo el n�mero de registros total, el tama�o de p�gina y la p�gina que se muestra
            echo '<div class="alert alert-info" role="alert">
                  <strong>Total de IS: '.$num_total_rows2.' EN PROCESO</strong>
                  <br>En cada pagina se muestran '.NUM_ITEMS_BY_PAGE.' IS<br>
                  Mostrando la página '.$page2.' de ' .$total_pages2.' páginas
                  </div>';



//where id not in (select indbound_id from proceso)
          $consulta2="SELECT indbound.is as 'is',indbound.fecha_llegada as 'fecha_llegada', indbound.tipo as 'tipo',indbound.unidades as 'unidades',indbound.estado as 'estado',indbound.atributo as 'atributo',proceso.id as 'idproceso',proceso.nomesa as 'nomesa' from proceso,indbound where indbound.id=proceso.indbound_id and proceso.estado=0 order by indbound.fecha_llegada asc limit ".$start.",".NUM_ITEMS_BY_PAGE;

          $result2 = $conn->query($consulta2);

          if ($result2->num_rows > 0) 
          {
                    
                while($row = $result2->fetch_assoc()) 
                      {
                      
                          echo '  <div class="card ">

                          <div class="card-header" id="'.$row['is'].'">
                            <h5 class="mb-0">
                              <button class="btn btn-link" data-toggle="collapse" data-target="#c'.$row['is'].'" aria-expanded="true" aria-controls="c'.$row['is'].'">
                                <h5><span class="badge badge-'.getColor(tiempo_transcurrido($row['fecha_llegada'])) .'">IS # '.$row['is'].'<br><i class="fas fa-tablet-alt"></i> Mesa No. '.$row['nomesa'].'</span></h5>


                               



                              </button>
                            </h5>
                          </div>

                          <div id="c'.$row['is'].'" class="collapse" aria-labelledby="'.$row['is'].'" data-parent="#accordion">
                            <div class="card-body">
                               <ul class="list-group list-group-flush">

                                <li class="list-group-item">Fecha: '.$row['fecha_llegada'].'</li>
                                <li class="list-group-item">Producto: '.$row['tipo'].'</li>
                                <li class="list-group-item">Piezas: '.$row['unidades'].'</li>
                                <li class="list-group-item">Estado: '.$row['estado'].'</li>
                                <li class="list-group-item">Pallet: '.$row['atributo'].'</li>
                                
                                  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#p'.$row['is'].'">
                                  Terminar
                                </button>

                              </ul>
                            </div>
                          </div>
                        </div>'; 

                        generarModalTerminar($row['is'],$row['idproceso']);

                      }
          }


      }




  


?>







         
      
<?php

   echo '<nav class="table-responsive mb-2">';
    echo '<ul class="pagination">';

    if ($total_pages2 > 1) 
    {
        if ($page2 != 1) 
        {
            echo '<li class="page-item"><a class="page-link" href="mesa.php?pages='.($page2-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for ($i=1;$i<=$total_pages2;$i++) 
        {
            if ($page2 == $i) 
            {
                echo '<li class="page-item active"><a class="page-link" href="#">'.$page2.'</a></li>';
            } else 
            {
                echo '<li class="page-item"><a class="page-link" href="mesa.php?pages2='.$i.'">'.$i.'</a></li>';
            }
        }

        if ($page2 != $total_pages2) 
        {
            echo '<li class="page-item"><a class="page-link" href="mesa.php?pages2='.($page2+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
        }
    }
    echo '</ul>';
    echo '</nav>';

          ?>


          
      </div>
    </div>

  </div>








    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

  </body>
</html>

<?php
}
?>