<?php
  session_start();
  if(!isset($_SESSION['id']))
  {
    header('Location: ../index.php');
    exit;
  }
  else
  {

		
		if(isset($_POST['agregarProceso']))
		{
			require_once 'Conectar.php';
			$id=$_POST['nois'];
			$nomesa=$_POST['nomesa'];

			$stmt = $conn->prepare("INSERT INTO `proceso` (`fecha`,`nomesa`,`indbound_id`) values(now(),?,?);");
			$stmt->bind_param("is",intval($nomesa),strval($id));

			if($stmt->execute())
			{
				header("Location: ../mesa.php");
			}
			else
			{
				echo "<script type=\"text/javascript\">alert(\"Ocurrio un error\");</script>"; 	
			}
		}
   }
?>