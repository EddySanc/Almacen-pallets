<?php
/*
if(isset($_POST["submit"]))
{*/

    require_once 'Conectar.php';
  

    $token=date("Ymdhis", time());
    $path = "excelInd/";
    $archivo2=$_FILES['file']['name'];
    $extension=basename( $archivo2);
    $path = $path .$token.$extension;
    $archivo=$_FILES['file']['tmp_name'];
    if(move_uploaded_file($archivo, $path)) {
    


    require_once './PHPExcel/Classes/PHPExcel.php';
    //require_once './PHPExcel/Classes/PHPExcel/IOFactory.php';
    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objReader->setReadDataOnly(true);
    
    $objPHPExcel = $objReader->load($path);
    $objWorksheet = $objPHPExcel->getActiveSheet();
    
    $highestRow = $objWorksheet->getHighestRow(); 
    $highestColumn = $objWorksheet->getHighestColumn(); 

    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); 


    $filaExcel=["","","","","","","","","","",""];
    $contador=0;
    //echo '<table border="1">' . "\n";
    for ($row = 2; $row <= $highestRow; ++$row) {
     // echo '<tr>' . "\n";

      for ($col = 0; $col <= $highestColumnIndex; ++$col) 
      {

        $valor=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();

       
        if($valor=="")
            {}
            else{
                
        //echo '<td>' .'Turno: '. $valor .'   '.$contador.'</td>' . "\n";
        //echo "<br>valores:" .strval($valor);
        $filaExcel[$contador]=strval($valor);

        //echo "<br>";
        //echo "Res: ".$filaExcel[$contador];
        $contador++;

        }


      }


      
$consulta="INSERT INTO `indbound`
(
`is`,
`tipo`,
`fecha_agendada`,
`fecha_llegada`,
`v_declarados`,
`v_recibidos`,
`codigo`,
`unidades`,
`origen`,
`estado`,
`atributo`
)
VALUES
(
?,
?,
?,
?,
?,
?,
?,
?,
?,
?,
?);"; 


$excel_date =$filaExcel[2]; //here is that value 41621 or 41631
$unix_date = ($excel_date - 25569) * 86400;
$excel_date = 25569 + ($unix_date / 86400);
$unix_date = ($excel_date - 25569) * 86400;
$date1=gmdate("Y-m-d H:i:s", $unix_date);

$excel_date2 =$filaExcel[3]; //here is that value 41621 or 41631
$unix_date2 = ($excel_date2 - 25569) * 86400;
$excel_date2 = 25569 + ($unix_date2 / 86400);
$unix_date2 = ($excel_date2 - 25569) * 86400;
$date2=gmdate("Y-m-d H:i:s", $unix_date2);



       $stmt = $conn->prepare($consulta);
       $stmt->bind_param("ssssiiidsss", strval($filaExcel[0]),strval($filaExcel[1]),strval($date1),strval($date2),intval($filaExcel[4]),intval($filaExcel[5]),intval($filaExcel[6]),doubleval($filaExcel[7]),strval($filaExcel[8]),strval($filaExcel[9]),strval($filaExcel[10]));
                        $stmt->execute();




      $contador=0;

      //echo '</tr>' . "\n";
    }

    $conn->close();
    //echo '</table>' . "\n";
    //header("Location: ../movimiento.php");
    echo '<script> location.href="../mesa.php"</script>';



    } else{
        echo "Ocurrio un error, Inténtelo nuevamente";
    }
  



     /*   
    $file = $_FILES['subirExcelPersona']['tmp_name'];
    echo "archivo:".$file;

    require_once './PHPExcel/Classes/PHPExcel.php';
//require_once './PHPExcel/Classes/PHPExcel/IOFactory.php';
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader->setReadDataOnly(true);

$objPHPExcel = $objReader->load($file);
$objWorksheet = $objPHPExcel->getActiveSheet();

$highestRow = $objWorksheet->getHighestRow(); 
$highestColumn = $objWorksheet->getHighestColumn(); 

$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); 

echo '<table border="1">' . "\n";
for ($row = 1; $row <= $highestRow; ++$row) {
  echo '<tr>' . "\n";

  for ($col = 0; $col <= $highestColumnIndex; ++$col) {
    $valor=$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
    if($valor=="")
        {}
        else{
    echo '<td>' . $valor . '</td>' . "\n";
  }

  }

  echo '</tr>' . "\n";
}
echo '</table>' . "\n";*/


/*}
else
{

    echo "erorr";
}*/

?>
