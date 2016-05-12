<html>
	<head>
		<?php
			include("../conexion/conexion.proc.php");
		?>
	</head>
	<body>
		<?php
			$sql = "SELECT * FROM tbl_usuario INNER JOIN tbl_tipousuario ON tbl_usuario.tipousuario = tbl_tipousuario.id_tipoUsuario WHERE tbl_tipousuario.id_tipoUsuario = 4 ORDER BY Rand()";
			$sql2 ="SELECT * FROM tbl_usuario ORDER BY id_usuario DESC limit 4";
			$datos = mysqli_query($con, $sql);
			$datos2 = mysqli_query($con, $sql2);
			while ($prod = mysqli_fetch_array($datos)){
				echo $prod['usuario'];
				echo "</br>";
				echo $prod['id_usuario'];
				echo $prod['bio_usuario'];

				        // Consulta numero total de posts
            $sql_posts = "SELECT COUNT(id_articulo) FROM tbl_articulo WHERE usuario_articulo = $prod[id_usuario]";
            $datos_posts = mysqli_query($con, $sql_posts);
            $prod_posts = mysqli_fetch_array($datos_posts);
            // Consulta total de likes
            $sql_likes = "SELECT tbl_usuario.id_usuario, tbl_articulo.id_articulo, COUNT(tbl_likes.id_likes) AS num_likes FROM tbl_usuario INNER JOIN tbl_articulo ON tbl_articulo.usuario_articulo = tbl_usuario.id_usuario INNER JOIN tbl_likes ON tbl_likes.articulo_likes = tbl_articulo.id_articulo WHERE tbl_usuario.id_usuario = $prod[id_usuario]";
            $datos_likes = mysqli_query($con, $sql_likes);
            $prod_likes = mysqli_fetch_array($datos_likes);
            echo $prod_posts['COUNT(id_articulo)'];
            echo $prod_likes['num_likes'];
			}
			while ($prod2 = mysqli_fetch_array($datos2)){
				echo "hola</br>";
				echo $prod2['id_usuario'];
				echo $prod2['usuario'];
				echo $prod2['bio_usuario'];
			}


		?>


	</body>
</html>