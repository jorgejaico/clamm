<html>
	<head>
	</head>
	<body>
		<?php
		session_start();
		include("../conexion/conexion.proc.php");
		$sql = "UPDATE tbl_articulo SET titulo_articulo='$_REQUEST[tiBlog]',texto_articulo='$_REQUEST[tBlog]' WHERE id_articulo=$_REQUEST[articId]";
		$resultado=mysqli_query($con, $sql);
		header("location: ../perfil/perfil.php");
		?>
	</body>
</html>