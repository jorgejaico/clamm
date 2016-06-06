<html>
	<head>
	</head>
	<body>
		<?php
		session_start();
		include("../conexion/conexion.proc.php");
		$sql="SELECT*FROM tbl_imgarticulo WHERE articulo_imgarticulo=$_REQUEST[idEliminar]";
		$sqlCon=mysqli_query($con, $sql);
		if(mysqli_num_rows($sqlCon) > 0){
			while($datos=mysqli_fetch_array($sqlCon)){
				echo $sqlEli = "DELETE FROM tbl_imgarticulo WHERE articulo_imgarticulo = $_REQUEST[idEliminar]";
				$sqlDel=mysqli_query($con, $sqlEli);
			}
		}
		$sqlLikes="SELECT*FROM tbl_likes WHERE articulo_likes=$_REQUEST[idEliminar]";
		$sqlLikesDatos=mysqli_query($con, $sqlLikes);
		if(mysqli_num_rows($sqlLikesDatos) > 0){
			while($datos=mysqli_fetch_array($sqlLikesDatos)){
				echo $sqlEliLikes = "DELETE FROM tbl_likes WHERE articulo_likes = $_REQUEST[idEliminar]";
				$sqlDelLikes=mysqli_query($con, $sqlEliLikes);
			}
		}
		$sqlComentario="SELECT*FROM tbl_comentario WHERE articulo_comentario=$_REQUEST[idEliminar]";
		$sqlComentarioDatos=mysqli_query($con, $sqlComentario);
		if(mysqli_num_rows($sqlComentarioDatos) > 0){
			while($datos=mysqli_fetch_array($sqlComentarioDatos)){
				$sqlEliComent = "DELETE FROM tbl_comentario WHERE articulo_comentario = $_REQUEST[idEliminar]";
				$sqlDelComent=mysqli_query($con, $sqlEliComent);
			}
		}
		$sqlTag="SELECT*FROM tbl_tagarticulo WHERE articulo_tagarticulo=$_REQUEST[idEliminar]";
		$sqlTagDatos=mysqli_query($con, $sqlTag);
		if(mysqli_num_rows($sqlTagDatos) > 0){
			while($datos=mysqli_fetch_array($sqlTagDatos)){
				$sqlEliTag = "DELETE FROM tbl_tagarticulo WHERE articulo_tagarticulo = $_REQUEST[idEliminar]";
				$sqlDelTag=mysqli_query($con, $sqlEliTag);
			}
		}
		$Eliminar = "DELETE FROM tbl_articulo WHERE id_articulo = $_REQUEST[idEliminar]";
		$sqlDel=mysqli_query($con, $Eliminar);
		header("location: ../../index.php");
		?>
	</body>
</html>