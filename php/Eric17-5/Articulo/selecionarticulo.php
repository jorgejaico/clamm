<!DOCTYPE html>
<html lang="es">
	<head>
		<?php
		//Conexion BDD 
			include("../conexion/conexion.proc.php");

		//Consulta ordena los articulos de mas nuevos a mas antiguo	
			$sql ="SELECT tbl_articulo.*, tbl_usuario.* FROM tbl_articulo  INNER JOIN tbl_usuario ON tbl_articulo.usuario_articulo = tbl_usuario.id_usuario WHERE tbl_articulo.tipo_articulo = 0 ORDER BY tbl_articulo.id_articulo DESC";
			
			$datos = mysqli_query($con, $sql);
			
		?>
	</head>
	<body>
		
			<?php
		while ($prod = mysqli_fetch_array($datos)){
			echo "<a href='articulo.php?idart=$prod[id_articulo]'>$prod[titulo_articulo]</a>";
			echo $prod['usuario'];
			echo "</br>";


		}
			?>
	</body>
</html>