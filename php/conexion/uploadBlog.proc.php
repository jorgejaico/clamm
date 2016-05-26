<html>
	<head>
	</head>
	<body>
		<?php
		session_start();
		$user = $_SESSION['id'];
		include("../conexion/conexion.proc.php");
		if(isset($_REQUEST['tipoPost'])){
			$sql = "INSERT INTO tbl_articulo (titulo_articulo, texto_articulo, usuario_articulo, portada_articulo, tipo_articulo) VALUES ('$_REQUEST[tiBlog]', '$_REQUEST[tBlog]', '$user', NULL, 1)";
			header("location: ../blogArticulo/selectorblogs.php");
		}else{
			$sql = "INSERT INTO tbl_articulo (titulo_articulo, texto_articulo, usuario_articulo, portada_articulo) VALUES ('$_REQUEST[tiBlog]', '$_REQUEST[tBlog]', '$user', NULL)";
			header("location: ../blogArticulo/selectorarticulos.php");
		}
		// echo $sql;
		$resultado=mysqli_query($con, $sql);
		
		?>
	</body>
</html>