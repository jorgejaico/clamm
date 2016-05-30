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
		<link rel="stylesheet" href="../../css/main.css" type="text/css">
		<script   src="https://code.jquery.com/jquery-1.4.1.js"   integrity="sha256-ntyfgTeB7KKq1t5474XNvpLuMrsKVnkb5NoPp7Rywdg="   crossorigin="anonymous"></script>

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
		var idB = document.getElementById('idBlog').value;
		
		xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
			}
		}
		xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+comments+'&idB='+idB, true); //open and send http request
		xmlhttp.send();
	}
	
		$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			var idB = document.getElementById('idBlog').value;
			setInterval(function() {$('#comment_logs').load('logs.php?idB='+idB);}, 2000);
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
		if(isset($_REQUEST['idB'])){
			$id = $_REQUEST['idB'];
		}else{
			$id = $_REQUEST['idArt'];
		}
			$sqlArtIMG = "SELECT*FROM tbl_imgarticulo WHERE articulo_imgarticulo = $id";
			$datosArtIMG = mysqli_query($con,$sqlArtIMG);
			$datosArtIMG2 = mysqli_query($con,$sqlArtIMG);
			$sqlusuario = "SELECT*FROM tbl_articulo INNER JOIN tbl_usuario ON tbl_articulo.usuario_articulo = tbl_usuario.id_usuario WHERE id_articulo=$id";	
			$blogusuario = mysqli_query($con,$sqlusuario);
			$produsuari = mysqli_fetch_array($blogusuario);
	?>

		<!-- Page Content -->
		<div class="container blog">
			
		        <!-- Blog Column -->
		        <div class="col-md-8">
		        	<div class="blog2">
		            <br>
		            
			            <div class="row blogu">
			            	<?php
			                //Consulta para articulos destacados		
							$sql1 = "SELECT*FROM tbl_articulo WHERE id_articulo=".$id;	
							$blog = mysqli_query($con,$sql1);
							$datos = mysqli_fetch_array($blog);
							?>
							<div class="titulocontent">
						<h3><?php echo utf8_encode($datos['titulo_articulo']); ?></h3></div>
							
							<?php
							echo "<div class='contenedortexto'>";
								echo utf8_encode($datos['texto_articulo']);
								$sqlLikes = "SELECT COUNT(id_likes) FROM tbl_likes WHERE articulo_likes=".$id;
								$artLikes = mysqli_query($con,$sqlLikes);
								$datosLikes = mysqli_fetch_array($artLikes);
								if(isset($_SESSION['id'])){
									$sqlLinkLikes = "SELECT*FROM tbl_likes WHERE usuario_likes=$_SESSION[id] AND articulo_likes=".$id;
									$artLinkLikes = mysqli_query($con,$sqlLinkLikes);
									echo "</div>";
								}

								if(isset($_REQUEST['idB'])){
									$sqlTags = "SELECT tbl_articulo.*, tbl_tagarticulo.*, tbl_tags.* FROM tbl_articulo INNER JOIN tbl_tagarticulo ON id_articulo=articulo_tagarticulo INNER JOIN tbl_tags ON id_tag=tag_tagarticulo WHERE id_articulo=".$_REQUEST['idB'];
								}else{
									$sqlTags = "SELECT tbl_articulo.*, tbl_tagarticulo.*, tbl_tags.* FROM tbl_articulo INNER JOIN tbl_tagarticulo ON id_articulo=articulo_tagarticulo INNER JOIN tbl_tags ON id_tag=tag_tagarticulo WHERE id_articulo=".$_REQUEST['idArt'];
								}
								$datosTags = mysqli_query($con, $sqlTags);
								while($prodTags = mysqli_fetch_array($datosTags)){
			                    ?>
			                    	<p><?php echo "<a href='selectorblogs.php?idT=$prodTags[id_tag]'>".$prodTags['nombre_tag']."</a>"; }?></p>
								<?php
								if(isset($_SESSION['id'])){
									if($datosLinkLikes = mysqli_num_rows($artLinkLikes) != 0){
										echo "<br/><a href='../conexion/like.proc.php?idB=$id'>No me gusta </a>";
									}else{
										echo "<br/><a href='../conexion/like.proc.php?idB=$id'>Me gusta </a>";
									}
										echo $datosLikes['COUNT(id_likes)'];
								}
								?>	
								</div>

								<!-- Slider -->

		
			            </div>

		           
		            

		            
		        	</div>
		         
		            <div class="col-md-4 sidebar-padding">
		               
		                
		                

						<!-- Blogs Destacados -->
			                <div class="sidecontent">
			                		<?php
										if(isset($_REQUEST['idB'])){
											$sql2 = "SELECT tbl_usuario.*, tbl_articulo.*, COUNT(tbl_likes.id_likes) AS num_like FROM tbl_usuario INNER JOIN tbl_articulo ON id_usuario = usuario_articulo LEFT JOIN tbl_likes ON tbl_likes.articulo_likes = tbl_articulo.id_articulo WHERE tbl_articulo.tipo_articulo = 0 GROUP BY tbl_articulo.id_articulo ORDER by COUNT(tbl_likes.id_likes) DESC LIMIT 4";
									?>
											<h4 class="sidebar-title"><i class="fa fa-align-left"></i> Blogs Destacados</h4>

									<?php
										}else{
											$sql2 = "SELECT tbl_usuario.*, tbl_articulo.*, COUNT(tbl_likes.id_likes) AS num_like FROM tbl_usuario INNER JOIN tbl_articulo ON id_usuario = usuario_articulo LEFT JOIN tbl_likes ON tbl_likes.articulo_likes = tbl_articulo.id_articulo WHERE tbl_articulo.tipo_articulo = 1 GROUP BY tbl_articulo.id_articulo ORDER by COUNT(tbl_likes.id_likes) DESC LIMIT 4";
									?>
											<h4 class="sidebar-title"><i class="fa fa-align-left"></i> Articulos Destacados</h4>
									<?php
										}
									?>
			                    <hr style="margin-bottom: 5px;">
							<?php
							
							$blogDest = mysqli_query($con,$sql2);
						while ($datos2 = mysqli_fetch_array($blogDest)){
							?>
			                    <div class="media">
			                        	<?php
			                        echo "<a class='pull-left' href='articulo.php?idart=$datos2[id_articulo]'>";
			                        	?>
			                            <img class="img-responsive media-object" src="../../usuarios/<?php echo $datos2['usuario'] ?>/<?php echo $datos2['portada_articulo'] ?>" alt="Media Object">
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
				
				</div> 

				<div id='wrapperslider'>
		<div id='headerslider'></div>
		<div class="slider">
		<div id='bodyslider'>
			<div id="bigPic">
				<?php
				while ($prodArtIMG = mysqli_fetch_array($datosArtIMG)){
					?>
				<img src="../../usuarios/<?php echo $produsuari['usuario'] ?>/<?php echo $prodArtIMG['nombre_imgarticulo']?>" alt="" />
				
					<?php
				};
				?>				

			</div>
			
			
			<ul id="thumbs">
<!-- <li class='active' rel='1'>  -->
				<?php
				$NumIMG = 1;
				while ($prodArtIMG2 = mysqli_fetch_array($datosArtIMG2)){
					if ($NumIMG == 1){
						echo "<li class='active' rel='1'>";
						echo "<img src='../../usuarios/".$produsuari['usuario']."/".$prodArtIMG2['nombre_imgarticulo']."' alt='' />";
						echo "</li>";
					}else{
						echo "<li rel='".$NumIMG."'>";
						echo "<img src='../../usuarios/".$produsuari['usuario']."/".$prodArtIMG2['nombre_imgarticulo']."' alt='' />";
						echo "</li>";
					};
				$NumIMG = $NumIMG + 1;
				}
				?>

			</ul>
		</li>
		</div>
		<div class='clearfix'></div>
		<div id='pushslider'></div>
	</div>
	<div class="page_content">
						    </div></div>

			<script type="text/javascript">
	var currentImage;
    var currentIndex = -1;
    var interval;
    function showImage(index){
        if(index < $('#bigPic img').length){
        	var indexImage = $('#bigPic img')[index]
            if(currentImage){   
            	if(currentImage != indexImage ){
                    $(currentImage).css('z-index',2);
                    clearTimeout(myTimer);
                    $(currentImage).fadeOut(250, function() {
					    myTimer = setTimeout("showNext()", 3000);
					    $(this).css({'display':'none','z-index':1})
					});
                }
            }
            $(indexImage).css({'display':'block', 'opacity':1});
            currentImage = indexImage;
            currentIndex = index;
            $('#thumbs li').removeClass('active');
            $($('#thumbs li')[index]).addClass('active');
        }
    }
    
    function showNext(){
        var len = $('#bigPic img').length;
        var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
        showImage(next);
    }
    
    var myTimer;
    
    $(document).ready(function() {
	    myTimer = setTimeout("showNext()", 3000);
		showNext(); //loads first image
        $('#thumbs li').bind('click',function(e){
        	var count = $(this).attr('rel');
        	showImage(parseInt(count)-1);
        });
	});
    
	
	</script>


				
		    </div>   <div id="comment_logs">
						    	Cargando comentarios...
						    </div>



							
						    <?php
						    	if(isset($_SESSION['id'])){
						    ?>
						    <div class="comment_input">
						        <form name="form1">
						    <?php
								}
						    ?>
						        	<input type="hidden" id="idBlog" value="<?php echo $id ?>" />
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