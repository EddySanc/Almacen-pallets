<?php
  session_start();
  if(!isset($_SESSION['id']))
  {
    header('Location: ../index.php');
    exit;
  }
  else
  {

		if(isset($_POST['insertarRecibo']))
		{
			
			require_once 'Conectar.php';
			$is=$_POST['is'];
			$stage=$_POST['stage'];
			$usuario=$_POST['usuario'];
			$pallet=$_POST['pallet'];

			//$fecha=(string)($_POST['fecha']);
			$fecha="2020-05-08 19:00:15";

			$stmt = $conn->prepare("
INSERT INTO `recibo`
(
`is`,
`stage`,
`usuario`,
`pallet`,
`fecha`)
VALUES
(
?,
?,
?,
?,
now());
				");
			$stmt->bind_param("ssss",strval($is),strval($stage),strval($usuario), strval($pallet));

			if($stmt->execute())
			{
				header("Location: ../stage.php");
			}
			else
			{
				echo "<script type=\"text/javascript\">alert(\"Ocurrio un error\");</script>"; 	
			}
         

		}
		else
		{

		}

  }


?>