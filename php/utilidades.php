
<?php
date_default_timezone_set('America/Mexico_City');


function generarModalTerminar($numeroIs,$id)
  {
    echo '<div class="modal" id="p'.$numeroIs.'">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title text-center">AVISO</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                
                '; 
                  
    echo '  <form method="POST" action="php/terminarProceso.php">
            <div class="form-group">
              <label for="numero">Número de IS: '.$numeroIs.'</label>
              <input type="hidden" class="form-control" id="nois" name="nois" value="'.$numeroIs.'">
              <input type="hidden" class="form-control" id="noid" name="noid" value="'.$id.'">
            </div>

            <button type="submit" name="terminarProceso" class="btn btn-primary">Terminar</button>
          </form>';

                  echo '
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
               
                </div>

              </div>
            </div>
          </div>
          ';

  }


//modal 2

  function generarModal($numeroIs,$id)
  {
    echo '<div class="modal" id="m'.$numeroIs.'">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title text-center">AVISO</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                
                '; 
                  
    echo '  <form method="POST" action="php/asignarProceso.php">
            <div class="form-group">
              <label for="numero">Número de IS: '.$numeroIs.'</label>
              <input type="hidden" class="form-control" id="nois" name="nois" value="'.$id.'">
            </div>
            <div class="form-group">
              <label for="pwd">Número de Mesa:</label>
              <input type="number" class="form-control" id="nomesa" name="nomesa" placeholder="Indique el número de mesa" required>
            </div>

            <button type="submit" name="agregarProceso" class="btn btn-primary">Enviar</button>
          </form>';
                       /*<form class="form-inline"  method="POST" action="php/asignarProceso.php">
                   <div class="form-group mx-sm-3">
                       
                   </div>
                   <div class="form-group mx-sm-3">
                       <input type="number" class="form-control" id="nomesa" name="nomesa" placeholder="Ingrese el número de mesa">
                   </div>
                   <button type="submit" class="btn btn-primary" name="agregarProceso" >Enviar</button>
                </form>*/


                  echo '
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
               
                </div>

              </div>
            </div>
          </div>
          ';

  }



function tiempo_transcurrido($fecha) {
  if(empty($fecha)) {
      return "No hay fecha";
  }
   
  $intervalos = array("segundo", "minuto", "hora", "día", "semana", "mes", "año");
  $duraciones = array("60","60","24","7","4.35","12");
   
  $ahora = time();
  $Fecha_Unix = strtotime($fecha);
  

  if(empty($Fecha_Unix)) {   
      return "Fecha incorracta-999";
  }
  if($ahora > $Fecha_Unix) {   
      $diferencia     =$ahora - $Fecha_Unix;
      $tiempo         = "Hace";
  } else {
      $diferencia     = $Fecha_Unix -$ahora;
      $tiempo         = "Dentro de";
  }
  for($j = 0; $diferencia >= $duraciones[$j] && $j < count($duraciones)-1; $j++) {
    $diferencia /= $duraciones[$j];
  }
   
  $diferencia = round($diferencia);
  
  if($diferencia != 1) {
    $intervalos[5].="e"; //MESES
    $intervalos[$j].= "s";
  }
   
    return "$diferencia-$intervalos[$j]";
}

function getColor($horas)
{
  

  $cadena="";
  $datos=explode("-", $horas);


  if($datos[1]=="segundo" or $datos[1]=="segundos")
  {
      //no ha pasado ni una hora
      $cadena="success";
  }
  
  if($datos[1]=="minuto" or $datos[1]=="minutos")
  {
      //no ha pasado ni una hora
     $cadena="success";
  }
  if($datos[1]=="horas" or $datos[1]=="hora")
  {

      if($datos[0]<6)
      {
         $cadena="success";
      }
      else if($datos[0]>=6 and $datos[0]<=12)
      {
         $cadena="warning";
      }
      else if($datos[0]>12)
      {
         $cadena="danger";
      }
  }
  else
  {
//hay mas de un día
    $cadena="dark";
  }

return $cadena;
  //if($horas)
}
?>