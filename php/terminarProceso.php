<?php

 session_start();
  if(!isset($_SESSION['id']))
  {
    header('Location: ../index.php');
    exit;
  }
  else
  {

		
		if(isset($_POST['terminarProceso']))
		{
			require_once 'Conectar.php';
			$id=$_POST['noid'];
			$is=$_POST['nois'];


			$sql="UPDATE `proceso` set estado=1 where `id`=".$id;
			echo "Consulta: ".$sql;

			if ($conn->query($sql) === TRUE) {
				  echo '<script> location.href="../mesa.php"</script>';
			} else {
				echo "<script type=\"text/javascript\">alert(\"Ocurrio un error\");</script>"; 	
			}

			$conn->close();

		}
   }


?>