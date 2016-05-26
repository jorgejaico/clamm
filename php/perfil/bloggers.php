<!DOCTYPE html>
<html lang="es">
	<head>
		<?php
		//Conexion BDD 
			include("../conexion/conexion.proc.php");
		//Consulta datos de usuario
			$sql = "SELECT * FROM tbl_usuario INNER JOIN tbl_tipousuario ON tbl_usuario.tipousuario = tbl_tipousuario.id_tipoUsuario WHERE tbl_tipousuario.id_tipoUsuario = 4 ORDER BY Rand()";
		//Consulta ultimos 4 usuarios registrados	
			$sql2 ="SELECT * FROM tbl_usuario ORDER BY id_usuario DESC limit 4";
			
			$datos = mysqli_query($con, $sql);
			$datos2 = mysqli_query($con, $sql2);



	//Inicio contenido de paginación Header
				//Cantidad de resultados por página (debe ser INT, no string/varchar)
			$cantidad_resultados_por_pagina = 5;

			//Comprueba si está seteado el GET de HTTP
			if (isset($_GET["pagina"])) {

				//Si el GET de HTTP SÍ es una string / cadena, procede
				if (is_string($_GET["pagina"])) {

					//Si la string es numérica, define la variable 'pagina'
					 if (is_numeric($_GET["pagina"])) {

						 //Si la petición desde la paginación es la página uno
						 //en lugar de ir a 'index.php?pagina=1' se iría directamente a 'index.php'
						 if ($_GET["pagina"] == 1) {
							 header("Location: bloggers.php");
							 die();
						 } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
							 $pagina = $_GET["pagina"];
						};

					 } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
						 header("Location: bloggers.php");
						die();
					 };
				};

			} else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
				$pagina = 1;
			};

			//Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
			$empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;
	//Fin Contenido Paginación Header

?>




		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>CLAMM - Bloggers</title>
		<!-- Bootstrap Core CSS -->
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="../../css/patros.css" >
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
	</head>

	<body data-spy="scroll">

		<!-- Navigation -->

	<?php
		include ("../headerfooter/header.php");

	// Paginación Inicio BODY
		//Obtiene TODO de la tabla
		$obtener_todo_BD = "SELECT * FROM tbl_usuario WHERE `tipousuario` = 4";

		//Realiza la consulta
		$consulta_todo = mysqli_query($con, $obtener_todo_BD);

		//Cuenta el número total de registros
		$total_registros = mysqli_num_rows($consulta_todo);

		//Obtiene el total de páginas existentes
		$total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina);
//Realiza la consulta en el orden de ID ascendente (cambiar "id" por, por ejemplo, "nombre" o "edad", alfabéticamente, etc.)
//Limitada por la cantidad de cantidad por página
$consulta_resultados = mysqli_query($con, "
SELECT tbl_usuario.*, tbl_articulo.*, COUNT(tbl_likes.id_likes) AS num_likes 
		FROM tbl_usuario LEFT JOIN tbl_articulo ON tbl_articulo.usuario_articulo = tbl_usuario.id_usuario 
						LEFT JOIN tbl_likes ON tbl_likes.articulo_likes = tbl_articulo.id_articulo 
						WHERE tbl_usuario.tipousuario = 4 GROUP BY tbl_usuario.id_usuario 
						ORDER by COUNT(tbl_likes.id_likes) DESC LIMIT $empezar_desde, $cantidad_resultados_por_pagina");
	// Paginación Final Inicio BODY

	?>

		

		<!-- Page Content -->
		<section class="container blog">
			<div class="row">
		        <!-- Blog Column -->
		        <div class="col-md-8">
		            <h1 class="page-header sidebar-title">
		                Bloggers
		            </h1>
		            <!-- First Blog Post -->
		            <?php
		            while ($prod = mysqli_fetch_array($consulta_resultados)){
		            	// Consulta numero total de posts
				            $sql_posts = "SELECT COUNT(id_articulo) FROM tbl_articulo WHERE usuario_articulo = $prod[id_usuario]";
				            $datos_posts = mysqli_query($con, $sql_posts);
				            $prod_posts = mysqli_fetch_array($datos_posts);
		                // Consulta total de likes
				            $sql_likes = "SELECT tbl_usuario.id_usuario, tbl_articulo.id_articulo, COUNT(tbl_likes.id_likes) AS num_likes FROM tbl_usuario INNER JOIN tbl_articulo ON tbl_articulo.usuario_articulo = tbl_usuario.id_usuario INNER JOIN tbl_likes ON tbl_likes.articulo_likes = tbl_articulo.id_articulo WHERE tbl_usuario.id_usuario = $prod[id_usuario]";
				            $datos_likes = mysqli_query($con, $sql_likes);
				            $prod_likes = mysqli_fetch_array($datos_likes);        	
		            	?>
			            <div class="row blogu">
			                <div class="imgresp ">
			                    <div class="blog-thumb">
			                        <a href="#">
			                            <img src="../../usuarios/<?php echo $prod['usuario'] ?>/<?php echo $prod['img_usuario'] ?>" class="img-responsive" alt="photo">
			                        </a>
			                    </div>
			                </div>
			                <div class="col-sm-8 col-md-8">
			                    <h2 class="blog-title">
			                        <a href="perfil.php?idPerfil=<?php echo $prod['id_usuario']  ?>"><?php echo $prod['usuario'];?></a>
			                    </h2>
			                    <p><i class="fa fa-calendar-o"></i>  Nº de posts: <b><?php echo $prod_posts['COUNT(id_articulo)']; ?></b>
			                        <span class="comments-padding"></span>
			                        <i class="fa fa-comment"></i> Nº de Likes: <b><?php echo $prod_likes['num_likes'];?></b>
			                    </p>
			                    <p><?php echo $prod['bio_usuario'];?></p>
			                </div>
			            </div>
			            <hr>
		            	<?php
		            }
		            ?>
		           <!-- Paginacion -->
		            <div class="text-center"> 
						<?php
						//Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
						//Nota: X = $total_paginas
						for ($i=1; $i<=$total_paginas; $i++) {
							//En el bucle, muestra la paginación
							 echo "<div class='text-center'> ";
								echo " <ul class='pagination'> ";
								    echo " <li><a href='?pagina=".$i."'>".$i."</a>  </li> ";
								            
								    echo " </ul> ";
							echo "  </div>";


						}; ?>
		            </div>
		        </div>
		            <!-- Blog Sidebar Column -->
		            <aside class="col-md-4 sidebar-padding">
		                <div class="blog-sidebar">
		                    <div class="input-group searchbar">
		                        <input type="text" class="form-control searchbar" placeholder="Search for...">
		                        <span class="input-group-btn">
		                        <button class="btn btn-default" type="button">Search</button>
		                        </span>
		                    </div><!-- /input-group -->
		                </div>
		                
		                <!-- Bloggers Destacados-->
		        <!--  Descomentar cuando tengamos la sentencia correcta-->
                  <!-- 	<div class="blog-sidebar">
		                    <h4 class="sidebar-title"><i class="fa fa-align-left"></i> Bloggers destacados</h4>
		                    <hr style="margin-bottom: 5px;">

		                    <div class="media">
		                        <a class="pull-left" href="#">
		                            <img class="img-responsive media-object" src="../../images/blog1.jpg" alt="Media Object">
		                        </a>
		                        <div class="media-body">
		                            <h4 class="media-heading"><a href="#">Post title 1</a></h4>
		                            This is some sample text. This is some sample text. This is some sample text.
		                        </div>
		                    </div>

		                    <div class="media">
		                        <a class="pull-left" href="#">
		                            <img class="img-responsive media-object" src="../../images/blog2.jpg" alt="Media Object">
		                        </a>
		                        <div class="media-body">
		                            <h4 class="media-heading"><a href="#">Post title 2</a></h4>
		                            This is some sample text. This is some sample text. This is some sample text.
		                        </div>
		                    </div>

		                    <div class="media">
		                        <a class="pull-left" href="#">
		                            <img class="img-responsive media-object" src="../../images/blog3.jpg" alt="Media Object">
		                        </a>
		                        <div class="media-body">
		                            <h4 class="media-heading"><a href="#">Post title 3</a></h4>
		                            This is some sample text. This is some sample text. This is some sample text.
		                        </div>
		                    </div>
		                    <div class="media">
		                        <a class="pull-left" href="#">
		                            <img class="img-responsive media-object" src="../../images/blog1.jpg" alt="Media Object">
		                        </a>
		                        <div class="media-body">
		                            <h4 class="media-heading"><a href="#">Post title 4</a></h4>
		                            This is some sample text. This is some sample text. This is some sample text.
		                        </div>
		                    </div>
		                </div> -->

		                <!-- Bloggers Recientes-->
		                <div class="blog-sidebar">
		                    <h4 class="sidebar-title"><i class="fa fa-align-left"></i> Bloggers Recientes</h4>
		                    <hr style="margin-bottom: 5px;">
		                    <?php
		                while ($prod2 = mysqli_fetch_array($datos2)){
		                	?>
		                    <div class="media">
		                    	

		                        <a class="pull-left" href="perfil.php" >
		                        	
		                            <img class="img-responsive media-object" src="../../usuarios/<?php echo $prod['usuario'] ?>/<?php echo $prod['img_usuario'] ?>" alt="Media Object">
		                        </a>
		                        <div class="media-body">
		                            <h4 class="media-heading"><a href="perfil.php"><?php echo $prod2['usuario']; ?></a></h4>
		                            <?php
		                            	echo $prod2['bio_usuario'];
		                            ?>
		                        </div>
		                    </div>

		                    <?php
		                }
		                    ?>

		                </div>

					</aside>
				</div>
		    </section>

        
		



		<?php
		include ("../headerfooter/footer.php");
	?>





        

    </body>
</html>