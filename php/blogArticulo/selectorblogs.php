<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

        <title>CLAMM - Articulos</title>

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
			<?php
		//Conexion BDD 
		include("../conexion/conexion.proc.php");

	//Consulta para articulos destacados		
		$sql3 ="SELECT tbl_usuario.*, tbl_articulo.*, COUNT(tbl_likes.id_likes) AS num_like FROM tbl_articulo 
		INNER JOIN tbl_likes ON tbl_likes.articulo_likes = tbl_articulo.id_articulo 
		INNER JOIN tbl_usuario ON id_usuario = usuario_articulo WHERE tbl_articulo.tipo_articulo = 1 GROUP BY tbl_articulo.id_articulo ORDER by COUNT(tbl_likes.id_likes) DESC ";
		$datos3 = mysqli_query($con, $sql3);
	






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
							 header("Location: selectorblogs.php");
							 die();
						 } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
							 $pagina = $_GET["pagina"];
						};

					 } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
						 header("Location: selectorblogs.php");
						die();
					 };
				};

			} else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
				$pagina = 1;
			};


			?>
	
	</head>

	<body data-spy="scroll">
		<!-- Navigation -->
				<?php
		include ("../headerfooter/header.php");

	//Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
			$empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;
	//Fin Contenido Paginación Header
			

		//Obtiene TODO de la tabla
		if(!isset($_REQUEST['idT'])){
			$obtener_todo_BD = "SELECT tbl_articulo.* FROM tbl_articulo WHERE tipo_articulo = 1";
		}else{
			$obtener_todo_BD = "SELECT tbl_articulo.* FROM tbl_articulo WHERE tipo_articulo = 1 AND id_tag=".$_REQUEST['idT'];
		}

		//Realiza la consulta
		$consulta_todo = mysqli_query($con, $obtener_todo_BD);

		//Cuenta el número total de registros
		$total_registros = mysqli_num_rows($consulta_todo);

		//Obtiene el total de páginas existentes
		$total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina);
		//Realiza la consulta en el orden de ID ascendente (cambiar "id" por, por ejemplo, "nombre" o "edad", alfabéticamente, etc.)
		//Limitada por la cantidad de cantidad por página
			if(!isset($_REQUEST['idT'])){
				$consulta_resultados = mysqli_query($con, "
				SELECT tbl_articulo.*, tbl_usuario.* FROM tbl_articulo 
				INNER JOIN tbl_usuario ON tbl_articulo.usuario_articulo = tbl_usuario.id_usuario 
				WHERE tbl_articulo.tipo_articulo = 1 ORDER BY tbl_articulo.fecha_articulo DESC 
				LIMIT $empezar_desde, $cantidad_resultados_por_pagina");
			}else{
				$consulta_resultados = mysqli_query($con, "
					SELECT tbl_articulo.*, tbl_tagarticulo.*, tbl_tags.*, tbl_usuario.* FROM tbl_usuario 
					INNER JOIN tbl_articulo ON id_usuario=usuario_articulo
					INNER JOIN tbl_tagarticulo ON id_articulo=articulo_tagarticulo 
					INNER JOIN tbl_tags ON id_tag=tag_tagarticulo WHERE id_tag=$_REQUEST[idT] 
					ORDER BY tbl_articulo.fecha_articulo DESC 
				LIMIT $empezar_desde, $cantidad_resultados_por_pagina");
			}
	// Paginación Final Inicio BODY






	?>

		<!-- Page Content -->
		<section class="container blog">
			<div class="row">
		        <!-- Blog Column -->
		        <div class="col-md-8">
		            <br><br><br>
		            <!-- First Blog Post -->
		            	<?php
					while ($prod = mysqli_fetch_array($consulta_resultados)){
						$sql2 ="SELECT tbl_usuario.*, tbl_articulo.id_articulo, COUNT(tbl_comentario.id_comentario) AS num_coment FROM tbl_comentario 
						INNER JOIN tbl_articulo ON tbl_comentario.articulo_comentario = tbl_articulo.id_articulo 
						INNER JOIN tbl_usuario ON id_usuario = usuario_articulo WHERE tbl_articulo.id_articulo = $prod[id_articulo]";
						$datos2 = mysqli_query($con, $sql2);
						$prod2 = mysqli_fetch_array($datos2);
						
						?>
			            <div class="row blogu">
			                <div class="col-sm-4 col-md-4 ">
			                    <div class="blog-thumb">
			                    		<?php
			                        echo "<a href='content.php?idB=$prod[id_articulo]'>";
			                        	?>
			                            <img class="img-responsive" src="../../usuarios/<?php echo $prod['usuario'] ?>/<?php echo $prod['portada_articulo'] ?>" alt="photo">
			                        </a>
			                    </div>
			                </div>
			                <div class="col-sm-8 col-md-8">
			                    <h2 class="blog-title">
			                        	<?php 
			                    	echo "<a href='content.php?idB=$prod[id_articulo]'>";
			                    	echo utf8_encode($prod['titulo_articulo']);
			                    	echo "</a>";
										?>
			                    </h2>
			                    <p>
			                    	<?php
			                    echo "<i class='autor'></i> <a href='../perfil/perfil.php?idPerfil=$prod[id_usuario]'>";
			                    echo utf8_encode($prod['usuario']);
			                	echo "</a>";
			                    
			                    	?>
			                    <span class="comments-padding"></span>
			                    <i class="fa fa-calendar-o"></i>  
			                    		<?php 
			                    		echo $prod['fecha_articulo'];
			                    		?>
			                        <span class="comments-padding"></span>
			                        <i class="fa fa-comment"></i> <?php echo $prod2['num_coment']?> Comentarios
			                    </p>
			                    	<?php

			                    	?>
			                    <p><?php echo utf8_encode(substr($prod['texto_articulo'], 0, 141)); ?></p>
			                    
			                </div>
			            </div>
			            <hr>

		           
		      		    <?php
					}
						?>     
		            

		 <!-- Nurmeros de paginación  -->
		            <div > 
						<?php
						//Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
						//Nota: X = $total_paginas
						for ($i=1; $i<=$total_paginas; $i++) {
							//En el bucle, muestra la paginación
							 // echo "<div class='text-center'> ";
								echo " <ul class='pagination'> ";
								    echo " <li><a href='?pagina=".$i."'>".$i."</a>  </li> ";
								            
								    echo " </ul> ";
							// echo "  </div>";


						}; ?>
		            </div>
		        </div>
		            <!-- Blog Sidebar Column -->
		            <aside class="col-md-4 sidebar-padding">
		                <div class="blog-sidebar">
		                  
		                </div>
		                
		                

						<!-- Blogs Destacados -->
			                <div class="blog-sidebar">
			                	<?php
			                		if(isset($_SESSION['id'])){
			                	?>
			                	<button><a href="../post/postear.php?tipoBlog=1">Crear blog</a></button>
			                	<?php
			                	}
			                	?>
			                    <h4 class="sidebar-title"><i class="fa fa-align-left"></i> Blogs Destacados</h4>
			                    <hr style="margin-bottom: 5px;">
							<?php
						while ($prod3 = mysqli_fetch_array($datos3)){
							?>
			                    <div class="media">
			                        	<?php
			                        echo "<a class='pull-left' href='content.php?idB=$prod3[id_articulo]'>";
			                        	?>
			                            <img class="img-responsive media-object" src="../../usuarios/<?php echo $prod3['usuario'] ?>/<?php echo $prod3['portada_articulo'] ?>" alt="Media Object">
			                        </a>
			                        <div class="media-body">
			                            <h4 class="media-heading">

			                            	
			                            	<?php
			                            		echo "<a href='content.php?idB=$prod3[id_articulo]'>";
			                    	echo utf8_encode($prod3['titulo_articulo']);
			                    	echo "</a>";
			                            	?>


			                            </h4>
			                            This is some sample text. This is some sample text. This is some sample text.
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


        <!-- jQuery -->
        <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>


        <!--Jquery Smooth Scrolling-->
        <script>
            $(document).ready(function(){
                $('.custom-menu a[href^="#"], .intro-scroller .inner-link').on('click',function (e) {
                    e.preventDefault();

                    var target = this.hash;
                    var $target = $(target);

                    $('html, body').stop().animate({
                        'scrollTop': $target.offset().top
                    }, 900, 'swing', function () {
                        window.location.hash = target;
                    });
                });

                $('a.page-scroll').bind('click', function(event) {
                    var $anchor = $(this);
                    $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                    }, 1500, 'easeInOutExpo');
                    event.preventDefault();
                });

               $(".nav a").on("click", function(){
                     $(".nav").find(".active").removeClass("active");
                    $(this).parent().addClass("active");
            	});

                $('body').append('<div id="toTop" class="btn btn-primary color1"><span class="glyphicon glyphicon-chevron-up"></span></div>');
                    $(window).scroll(function () {
                        if ($(this).scrollTop() != 0) {
                            $('#toTop').fadeIn();
                        } else {
                            $('#toTop').fadeOut();
                        }
                    }); 
                $('#toTop').click(function(){
                    $("html, body").animate({ scrollTop: 0 }, 700);
                    return false;
                });

            });
        </script>

    </body>
</html>