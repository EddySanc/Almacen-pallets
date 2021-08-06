<?php
  session_start();
  if(!isset($_SESSION['id']))
  {
    header('Location: ../index.php');
    exit;
  }
  else
  {

		if(isset($_POST['insertarStage']))
		{
			
			require_once 'Conectar.php';
			$is=$_POST['is'];
			$mesa=$_POST['mesa'];
			$stage=$_POST['stage'];
			$usuario=$_POST['usuario'];
			$pallet=$_POST['pallet'];


			//$fecha=(string)($_POST['fecha']);
			$fecha="2020-05-08 19:00:15";

			$stmt = $conn->prepare("
INSERT INTO `stage`
(
`is`,
`mesa`,
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
?,
now());
				");
			$stmt->bind_param("sssss",strval($is),strval($mesa),strval($stage),strval($usuario), strval($pallet));

			if($stmt->execute())
			{
				header("Location: ../movimiento.php");
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