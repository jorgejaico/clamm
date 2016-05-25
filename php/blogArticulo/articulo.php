<!DOCTYPE html>
<html lang="en">

	<head>
		<?php
			session_start();
		?>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

        <title>CLAMM - Articulos</title>

        <!-- Bootstrap Core CSS -->
        <link href="../../css/reset.css" rel="stylesheet" type="text/css">
		<link href="../../css/style.css" rel="stylesheet" type="text/css">
        <link href="../../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
		<link rel="stylesheet" href="../../css/patros.css" >

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>

	function commentSubmit(){
		if(form1.name.value == '' && form1.comments.value == ''){ //exit if one of the field is blank
			alert('Enter your message !');
			return;
		}
		var comments = form1.comments.value;
		var xmlhttp = new XMLHttpRequest(); //http request instance
		var idArt = document.getElementById('idArt').value;
		
		xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
			}
		}
		xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+comments+'&idArt='+idArt, true); //open and send http request
		xmlhttp.send();
	}
	
		$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			var idArt = document.getElementById('idArt').value;
			setInterval(function() {$('#comment_logs').load('logs.php?idArt='+idArt);}, 2000);
		});
		
</script>
			<?php
		//Conexion BDD 
		include("../conexion/conexion.proc.php");

	
	
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
		        <!-- article Column -->
		        <div class="col-md-8">
		            <br><br><br>
		            
			            <div class="row blogu">
			            	<?php
			                //Consulta para articulos destacados		
							$sql1 = "SELECT*FROM tbl_articulo WHERE id_articulo=".$_REQUEST['idArt'];	
							$art = mysqli_query($con,$sql1);
							$datos = mysqli_fetch_array($art);
							?>
						<h2><?php echo utf8_encode($datos['titulo_articulo']); ?></h2>
							
							<?php
								echo utf8_encode($datos['texto_articulo']);
							?>	
							<div class="page_content">
						    </div>
						    <?php
						    	if(isset($_SESSION['id'])){
						    ?>
						    <div class="comment_input">
						        <form name="form1">
						    <?php
								}
						    ?>
						        	<input type="hidden" id="idArt" value="<?php echo $_REQUEST['idArt'] ?>" />
							<?php
						    	if(isset($_SESSION['id'])){
						    ?>
						            <textarea name="comments" placeholder="Deja aquí tu comentario..." style="width:635px; height:100px;"></textarea></br></br>
						           
						            <a href="#" onClick="commentSubmit()" class="button">Publicar</a></br>
						        </form>
						    </div>
						     <?php
								}
						    ?>
						    <div id="comment_logs">
						    	Cargando comentarios...
						    </div>
			            </div>

		           
		            

		            
		        	</div>
		         
		            <aside class="col-md-4 sidebar-padding">
		               
		                
		                

						<!-- Blogs Destacados -->
			                <div class="blog-sidebar">
			                    <h4 class="sidebar-title"><i class="fa fa-align-left"></i> Articulos Destacados</h4>
			                    <hr style="margin-bottom: 5px;">
							<?php
							$sql2 = "SELECT tbl_articulo.*, COUNT(tbl_likes.id_likes) AS num_like FROM tbl_articulo LEFT JOIN tbl_likes ON tbl_likes.articulo_likes = tbl_articulo.id_articulo WHERE tbl_articulo.tipo_articulo = 0 GROUP BY tbl_articulo.id_articulo ORDER by COUNT(tbl_likes.id_likes) DESC LIMIT 4";
							$ArtDest = mysqli_query($con,$sql2);
						while ($datos2 = mysqli_fetch_array($ArtDest)){
							?>
			                    <div class="media">
			                        	<?php
			                        echo "<a class='pull-left' href='articulo.php?idart=$datos2[id_articulo]'>";
			                        	?>
			                            <img class="img-responsive media-object" src="../../images/<?php echo $datos2['portada_articulo'] ?>" alt="Media Object">
			                        </a>
			                        <div class="media-body">
			                            <h4 class="media-heading">

			                            	<h4 class="media-heading">

				                            	
				                            	<?php
				                            		echo "<a href='articulo.php?idart=$datos2[id_articulo]'>";
				                    				echo utf8_encode($datos2['titulo_articulo']);
				                    				echo "</a>";
				                            	?>


			                           		 </h4>
			                            	<?php
			                    				echo utf8_encode(substr($datos2['texto_articulo'], 0, 41))."...";
			                            	?>


			                            </h4>
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