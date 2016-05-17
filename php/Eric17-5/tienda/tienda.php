<!DOCTYPE html>
<html lang="es">
	<head>
		<?php
		//Conexion BDD 
			include("../conexion/conexion.proc.php");
			$sql ="SELECT * FROM `tbl_usuario` INNER JOIN tbl_anuncio ON tbl_usuario.id_usuario = tbl_anuncio.usuario_anuncio WHERE tbl_anuncio.activo_anuncio = 1 GROUP BY tbl_usuario.id_usuario ORDER BY RAND()";

			$datos = mysqli_query($con, $sql);
		?>
	</head>
	<body>
		
			<?php
				while ($prod = mysqli_fetch_array($datos)){

					$sql2 ="SELECT * FROM `tbl_usuario` INNER JOIN tbl_anuncio ON tbl_usuario.id_usuario = tbl_anuncio.usuario_anuncio WHERE tbl_anuncio.usuario_anuncio = $prod[id_usuario] AND tbl_anuncio.activo_anuncio = 1";
					$datos2 = mysqli_query($con, $sql2);

					echo $prod["usuario"];
					echo "</br>";
					while ($prod2 = mysqli_fetch_array($datos2)){
						echo "hola";
						echo "</br>";

					}
				}
			?>
	</body>
</html>