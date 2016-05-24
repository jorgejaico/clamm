<html>
	<head>
	</head>
	<body>
		<?php
		include("../conexion/conexion.proc.php");
		$sql = "INSERT INTO tbl_articulo (titulo_articulo, texto_articulo, usuario_articulo, portada_articulo, tipo_articulo) VALUES ('$_REQUEST[tiBlog]', '$_REQUEST[tBlog]', '1', NULL, 1)";
		echo $sql;
		$resultado=mysqli_query($con, $sql);
			// echo $_REQUEST['tBlog'];
		header("location: ../blogArticulo/selectorblogs.php")
		?>
	</body>
</html>