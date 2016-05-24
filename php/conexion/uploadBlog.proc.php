<html>
	<head>
	</head>
	<body>
		<?php
		session_start();
		$user = $_SESSION['id'];
		include("../conexion/conexion.proc.php");
		$sql = "INSERT INTO tbl_articulo (titulo_articulo, texto_articulo, usuario_articulo, portada_articulo, tipo_articulo) VALUES ('$_REQUEST[tiBlog]', '$_REQUEST[tBlog]', '$user', NULL, 1)";
		echo $sql;
		$resultado=mysqli_query($con, $sql);
			// echo $_REQUEST['tBlog'];
		header("location: ../blogArticulo/selectorblogs.php")
		?>
	</body>
</html>