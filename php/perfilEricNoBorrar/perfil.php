<html>
	<head>
		<title>Astral by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<?php
// Cambiar conexión
		 	$con = mysqli_connect('localhost', 'root', '', 'bd_clamm');
		?>
		
	</head>
	<body>
		<?php
			$sql= "SELECT tbl_usuario.* FROM tbl_usuario 
					WHERE id_usuario = '$_REQUEST[idPerfil]'";


			$sql2 = "SELECT tbl_usuario.*, tbl_articulo.* FROM tbl_usuario 
					INNER JOIN tbl_articulo ON tbl_usuario.id_usuario=tbl_articulo.usuario_articulo  
                    WHERE tbl_usuario.id_usuario = '$_REQUEST[idPerfil]'";

            $sql_posts = "SELECT COUNT(id_articulo) FROM tbl_articulo WHERE usuario_articulo = '$_REQUEST[idPerfil]'";
            $sql_likes = "SELECT tbl_usuario.id_usuario, tbl_articulo.id_articulo, COUNT(tbl_likes.id_likes) AS num_likes FROM tbl_usuario INNER JOIN tbl_articulo ON tbl_articulo.usuario_articulo = tbl_usuario.id_usuario INNER JOIN tbl_likes ON tbl_likes.articulo_likes = tbl_articulo.id_articulo WHERE tbl_usuario.id_usuario = '$_REQUEST[idPerfil]'";
            // echo $sql;
            $datos = mysqli_query($con, $sql);
            $datos2 = mysqli_query($con, $sql2);
            $datos_posts = mysqli_query($con, $sql_posts);
            $datos_likes = mysqli_query($con, $sql_likes);
            $prod = mysqli_fetch_array($datos);
            $prod_posts = mysqli_fetch_array($datos_posts);
            $prod_likes = mysqli_fetch_array($datos_likes);
			



           		echo utf8_encode("<h1>$prod[usuario]</h1>");
				echo utf8_encode("<p>$prod[img_usuario]</p>");
				echo utf8_encode("<p>$prod[bio_usuario]</p>");
				echo "post:";
				echo $prod_posts['COUNT(id_articulo)'];
				echo "</br>likes:";
				echo $prod_likes['num_likes'];

				echo "</br>obras:</br>";
			while ($prod2 = mysqli_fetch_array($datos2)) {
				echo "$prod2[id_articulo]</br>";
				echo "$prod2[titulo_articulo]</br>";
				echo "$prod2[usuario]</br>";
				echo "$prod2[portada_articulo]</br>";	
				echo "<hr>";
			}
        ?>





	</body>

</html>