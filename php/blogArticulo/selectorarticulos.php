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

		//Consulta ordena los articulos de mas nuevos a mas antiguo	
		$sql ="SELECT tbl_articulo.*, tbl_usuario.* FROM tbl_articulo  INNER JOIN tbl_usuario ON tbl_articulo.usuario_articulo = tbl_usuario.id_usuario WHERE tbl_articulo.tipo_articulo = 0 ORDER BY tbl_articulo.fecha_articulo DESC";		
		$datos = mysqli_query($con, $sql);
		
		$sql3 ="SELECT tbl_articulo.*, COUNT(tbl_likes.id_likes) AS num_like FROM tbl_articulo INNER JOIN tbl_likes ON tbl_likes.articulo_likes = tbl_articulo.id_articulo WHERE tbl_articulo.tipo_articulo = 0 GROUP BY tbl_articulo.id_articulo ORDER by COUNT(tbl_likes.id_likes) DESC ";
		$datos3 = mysqli_query($con, $sql3);
			?>
	</head>

	<body data-spy="scroll">
		<!-- Navigation -->
				<?php
		include ("../headerfooter/header.php");
	?>

		<!-- Page Content -->
		<section class="container blog">
			<div class="row">
		        <!-- Blog Column -->
		        <div class="col-md-8">
		            <br><br><br>
		            <!-- First Blog Post -->
		            	<?php
					while ($prod = mysqli_fetch_array($datos)){
						$sql2 ="SELECT tbl_articulo.id_articulo, COUNT(tbl_comentario.id_comentario) AS num_coment FROM tbl_comentario INNER JOIN tbl_articulo ON tbl_comentario.articulo_comentario = tbl_articulo.id_articulo WHERE tbl_articulo.id_articulo = $prod[id_articulo]";
						$datos2 = mysqli_query($con, $sql2);
						$prod2 = mysqli_fetch_array($datos2);

						?>
			            <div class="row blogu">
			                <div class="col-sm-4 col-md-4 ">
			                    <div class="blog-thumb">
			                    		<?php
			                        echo "<a href='articulo.php?idart=$prod[id_articulo]'>";
			                        	?>
			                            <img class="img-responsive" src="../../images/<?php echo $prod['portada_articulo'] ?>" alt="photo">
			                        </a>
			                    </div>
			                </div>
			                <div class="col-sm-8 col-md-8">
			                    <h2 class="blog-title">
			                        	<?php 
			                    	echo "<a href='articulo.php?idart=$prod[id_articulo]'>";
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
		            

		           
		            <div class="text-center"> 
		                <ul class="pagination"> 
		                    <li class="active"> <a href="#">1</a> </li> 
		                    <li> <a href="#">2</a> </li> 
		                    <li> <a href="#">3</a> </li> 
		                    <li> <a href="#">4</a> </li> 
		                    <li> <a href="#">5</a> </li> 
		                    <li> <a href="#">Next</a> </li> 
		                </ul> 
		            </div>
		        </div>
		            <!-- Blog Sidebar Column -->
		            <aside class="col-md-4 sidebar-padding">
		                <div class="blog-sidebar">
		                    <div class="input-group searchbar">
		                        <input type="text" class="form-control searchbar" placeholder="Search for...">
		                        <span class="input-group-btn">
		                        <button class="btn btn-default" type="button">Buscar</button>
		                        </span>
		                    </div><!-- /input-group -->
		                </div>
		                
		                

						<!-- Blogs Destacados -->
			                <div class="blog-sidebar">
			                    <h4 class="sidebar-title"><i class="fa fa-align-left"></i> Articulos Destacados</h4>
			                    <hr style="margin-bottom: 5px;">
							<?php
						while ($prod3 = mysqli_fetch_array($datos3)){
							?>
			                    <div class="media">
			                        	<?php
			                        echo "<a class='pull-left' href='articulo.php?idart=$prod3[id_articulo]'>";
			                        	?>
			                            <img class="img-responsive media-object" src="../../images/<?php echo $prod3['portada_articulo'] ?>" alt="Media Object">
			                        </a>
			                        <div class="media-body">
			                            <h4 class="media-heading">

			                            	
			                            	<?php
			                            		echo "<a href='articulo.php?idart=$prod3[id_articulo]'>";
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