<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>CLAMM - Mi Perfil</title>
		<!-- Bootstrap Core CSS -->
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="../../css/patros.css" >
		<link rel="stylesheet" href="../../css/perfil.css" >
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->

		<?php
			include("../conexion/conexion.proc.php");
			if(!isset($_REQUEST['idPerfil']) or $_REQUEST['idPerfil'] == $_SESSION['id']){
		// Consulta nombre y descripcion del usuario 
			$sql= "SELECT tbl_usuario.* FROM tbl_usuario 
					WHERE id_usuario = '$_SESSION[id]'";

		// Consulta listar todos los articulos del usuario
			$sql2 = "SELECT tbl_usuario.*, tbl_articulo.* FROM tbl_usuario 
					INNER JOIN tbl_articulo ON tbl_usuario.id_usuario=tbl_articulo.usuario_articulo  
                    WHERE tbl_usuario.id_usuario = '$_SESSION[id]'";

        // Consulta numero total de posts
            $sql_posts = "SELECT COUNT(id_articulo) FROM tbl_articulo WHERE usuario_articulo = '$_SESSION[id]'";
        
        //Consulta numero total likes en posts
            $sql_likes = "SELECT tbl_usuario.id_usuario, tbl_articulo.id_articulo, COUNT(tbl_likes.id_likes) AS num_likes FROM tbl_usuario INNER JOIN tbl_articulo ON tbl_articulo.usuario_articulo = tbl_usuario.id_usuario INNER JOIN tbl_likes ON tbl_likes.articulo_likes = tbl_articulo.id_articulo WHERE tbl_usuario.id_usuario = '$_SESSION[id]'";
        }else{
        	// Consulta nombre y descripcion del usuario 
			$sql= "SELECT tbl_usuario.* FROM tbl_usuario 
					WHERE id_usuario = '$_REQUEST[idPerfil]'";

		// Consulta listar todos los articulos del usuario
			$sql2 = "SELECT tbl_usuario.*, tbl_articulo.* FROM tbl_usuario 
					INNER JOIN tbl_articulo ON tbl_usuario.id_usuario=tbl_articulo.usuario_articulo  
                    WHERE tbl_usuario.id_usuario = '$_REQUEST[idPerfil]'";

        // Consulta numero total de posts
            $sql_posts = "SELECT COUNT(id_articulo) FROM tbl_articulo WHERE usuario_articulo = '$_REQUEST[idPerfil]'";
        
        //Consulta numero total likes en posts
            $sql_likes = "SELECT tbl_usuario.id_usuario, tbl_articulo.id_articulo, COUNT(tbl_likes.id_likes) AS num_likes FROM tbl_usuario INNER JOIN tbl_articulo ON tbl_articulo.usuario_articulo = tbl_usuario.id_usuario INNER JOIN tbl_likes ON tbl_likes.articulo_likes = tbl_articulo.id_articulo WHERE tbl_usuario.id_usuario = '$_REQUEST[idPerfil]'";
        }
            // echo $sql;
            $datos = mysqli_query($con, $sql);
            $datos2 = mysqli_query($con, $sql2);
            $datos_posts = mysqli_query($con, $sql_posts);
            $datos_likes = mysqli_query($con, $sql_likes);
            $prod = mysqli_fetch_array($datos);
            $prod_posts = mysqli_fetch_array($datos_posts);
            $prod_likes = mysqli_fetch_array($datos_likes);

		?>
	</head>

	<body data-spy="jumbotron">
		<!-- Navigation -->


	<?php
		include ("../headerfooter/header.php");
	?>



			
		<!-- Page Content -->
		<div class="contenedorperfil">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-sx-12">
            <div class="current-profile">
                <div class="user-bg" style="background-color: grey "</div>
                <div class="user-pic">
                	<img src="../../usuarios/<?php echo $prod['usuario'] ?>/<?php echo $prod['img_usuario'] ?>" class="img-responsive" />
                </div>
                <div class="user-details">
                	<?php
                		echo utf8_encode("<h4 class='user-name'>$prod[usuario]<i></i></h4>");
                	
                		echo utf8_encode("<h5 class='description'>$prod[bio_usuario]</h5>");

                	?>
                    
                    
                    <br>
                </div>
                <div class="social-list">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-0">
                            
                                <div class="col-md-6 col-sm-6 col-xs-6 center-align-text">
                                	<h3>
                                		<?php
                                			echo $prod_posts['COUNT(id_articulo)'];
                                		?>
                                	</h3>
                                    <!-- <h3>2359</h3> -->
                                    <small>Posts</small>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 center-align-text">
                                    <h3>
                                    	<?php
                                    		echo $prod_likes['num_likes'];
                                    	?>	
                                    </h3>
                                    <small>Likes</small>
                                </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="articulos">
			<div class="container">
				<div class="text-center"><h2>Blogs de 
					<?php
						echo $prod['usuario'];
					?>
				</h2>
					<img class="img-responsive displayed" src="../../images/short.png" alt="noticias">
				</div>
				<div class="row">
					<div class="col-md-12 homeport1">
							<?php
								while ($prod2 = mysqli_fetch_array($datos2)){
								?>
							<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item">
								<figure class="effect-oscar">
									<img src="images/<?php echo $prod2['portada_articulo'] ?>" class="img-responsive" />
									<figcaption>
										<h2><?php echo utf8_encode($prod2['titulo_articulo']) ?></h2>
										<a href="#">View more</a>
									</figcaption>           
								</figure>
								<p class="text-center"><?php echo utf8_encode(substr($prod2['texto_articulo'], 0, 141)) ?></p>
								<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Read More</a></div>
							</div>
							<?php
							}
						?>
								
						</div>
						<div>
							<?php
							 if(!isset($_REQUEST['idPerfil']) or $_REQUEST['idPerfil'] == $_SESSION['id']){

								$sqlanuncio = "SELECT tbl_anuncio.* FROM tbl_anuncio  WHERE tbl_anuncio.usuario_anuncio = $_SESSION[id]";
								$datos_anuncio = mysqli_query($con, $sqlanuncio);


								while ($prod_anuncio = mysqli_fetch_array($datos_anuncio)){



									$sqlpublicacion ="SELECT tbl_publicacion.*, CURRENT_DATE() AS Fecha FROM tbl_publicacion WHERE tbl_publicacion.fechainicio_publicacion <= CAST(CURRENT_DATE() AS date) AND tbl_publicacion.fechafinal_publicacion >= CAST(CURRENT_DATE() AS date) AND tbl_publicacion.anuncio_publicacion = $prod_anuncio[id_anuncio]";
									$datos_publicacion = mysqli_query($con, $sqlpublicacion);
									$prod_publicacion = mysqli_num_rows($datos_publicacion);

									if($prod_publicacion==0){
									//Anuncio desactivado
									?>
										<div class="col-md-3 col-sm-6 col-xs-12 portfolio-item">
											<div class="contenedorcatalogo">
								
												<img class="img-responsive" src="../../<?php echo $prod['usuario']?>/<?php echo $prod_anuncio['imagen_anuncio'] ?>" alt="photo">								
												<h3><?php echo utf8_encode($prod_anuncio['titulo_anuncio']); ?></h3>      
									
												<p class="text-center"><?php echo utf8_encode($prod_anuncio['texto_anuncio']); ?></p>
												<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom" href="../tienda/editaranuncio.php?mdA=<?php echo $prod_anuncio['id_anuncio'] ?>">Modificar</a></div>
												<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom" href="//<?php echo $prod['enlace_anuncio'] ?>">Activar</a></div>
											</div>
										</div>
									<?php
									}else{
									//Anuncio activado
									?>
										<div class="col-md-3 col-sm-6 col-xs-12 portfolio-item">
											<div class="contenedorcatalogo">
								
												<img class="img-responsive" src="../../<?php echo $prod['usuario']?>/<?php echo $prod_anuncio['imagen_anuncio'] ?>" alt="photo">								
												<h3><?php echo utf8_encode($prod_anuncio['titulo_anuncio']); ?></h3>      
									
												<p class="text-center"><?php echo utf8_encode($prod_anuncio['texto_anuncio']); ?></p>
												<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom" href="../tienda/editaranuncio.php?mdA=<?php echo $prod_anuncio['id_anuncio'] ?>">Modificar</a></div>
											</div>
										</div>
									<?php
									}

								}
							}

							?>
						</div>





					</div>
				</div>
			</div>


</div>
		<!-- Footer -->


	<?php
		include ("../headerfooter/footer.php");
	?>
		<!-- jQuery -->
		<script src="../../js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="../../js/bootstrap.min.js"></script>


</body>
</html>




