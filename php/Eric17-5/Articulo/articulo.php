<!DOCTYPE html>
<html lang="es">
	<head>
		<?php
		//Conexion BDD 
			include("../conexion/conexion.proc.php");
			
		// Consulta busca en articulo indicado	
			$sql ="SELECT tbl_articulo.*, tbl_usuario.* FROM tbl_articulo  INNER JOIN tbl_usuario ON tbl_articulo.usuario_articulo = tbl_usuario.id_usuario WHERE tbl_articulo.id_articulo = $_REQUEST[idart]";
		// Seleccionamos las img de este articulo 
			$sql2 = "SELECT * FROM tbl_imgarticulo WHERE articulo_imgarticulo = $_REQUEST[idart]";
			
			$datos = mysqli_query($con, $sql);
			$datos2 = mysqli_query($con, $sql2);
			$prod = mysqli_fetch_array($datos);
			
		?>
	</head>
	<body>
		
			<?php

			echo $_REQUEST['idart'];
			echo "</br>";
			echo $prod ['titulo_articulo'];
			echo "</br>";
			echo $prod ['texto_articulo'];
			echo "</br>";
			echo "Imagenes:";
			echo "</br>";
			while ($prod2 = mysqli_fetch_array($datos2)){
				echo $prod2 ['nombre_imgarticulo'];
			echo "</br>";
			}


	
			?>
	</body>
</html>