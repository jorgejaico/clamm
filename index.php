<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>CLAMM - Marca tendencia</title>
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/patros.css" >
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
		include ("php/headerfooter/header.php");
		include ("php/conexion/conexion.proc.php");
	?>

		<!-- Header Carousel -->
		<header id="home" class="carousel slide">
			<ul class="cb-slideshow">
				<li><span>image1</span>
					<div class="container">
						<div class="row">
						
						</div>
						
					</div>
				</li>
				<li><span>image2</span>
					<div class="container">
						<div class="row">
							
						
					</div>
				</li>
				<li><span>image3</span>
					<div class="container">
						<div class="row">
							
						</div>
						
					</div>
				</li>
				<li><span>Image 04</span>
					<div class="container">
						<div class="row">
							
						</div>
						
					</div>
				</li>
				<li><span>Image 05</span>
					<div class="container">
						<div class="row">
							
						</div>
						
					</div>
				</li>
			</ul>

			</div>          
		</header>
			
		<!-- Page Content -->


		<?php
			$sql = "SELECT*FROM tbl_articulo ORDER BY fecha_articulo ASC LIMIT 6";
			$art_fechas=mysqli_query($con, $sql);
		?>

		<section id="noticias">
			<div class="container">
				<div class="text-center"><h2>Últimos blogs</h2>
					<img class="img-responsive displayed" src="images/short.png" alt="noticias">
				</div>
				<div class="row">
					<div class="col-md-12 homeport1">
						<?php
							while($datos=mysqli_fetch_array($art_fechas)){
						?>
							<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item">
								<div class="contenedorarticulos">
								<figure class="effect-oscar">
									<img src="images/<?php echo utf8_encode($datos['portada_articulo']) ?>" class="img-responsive" />
									<figcaption>
										<h2><?php echo utf8_encode($datos['titulo_articulo']) ?></h2>
										<a href="#">View more</a>
									</figcaption>           
								</figure>
								<p class="text-center"><?php echo utf8_encode(substr($datos['texto_articulo'], 0, 141)) ?></p>
								<div class="text-center"><a href="php/blogArticulo/blog.php?idB=<?php echo utf8_encode($datos['id_articulo']) ?>" class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Leer más</a></div>
							</div></div>
						<?php
							}
						?>
						
					</div>
				</div>
			</div>
		</section>

		


	

		
		<!-- Footer -->
		<div class="col-lg-12 col-md-8">
	<?php
		include ("php/headerfooter/footer.php");
	?></div>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Google Map -->
		<script src="//maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=true&amp;libraries=places"></script>

		<!-- Portfolio -->
		<script src="js/jquery.quicksand.js"></script>	    
	

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

		<script>
		function gallery(){};

		var $itemsHolder = $('ul.port2');
		var $itemsClone = $itemsHolder.clone(); 
		var $filterClass = "";
		$('ul.filter li').click(function(e) {
		e.preventDefault();
		$filterClass = $(this).attr('data-value');
			if($filterClass == 'all'){ var $filters = $itemsClone.find('li'); }
			else { var $filters = $itemsClone.find('li[data-type='+ $filterClass +']'); }
			$itemsHolder.quicksand(
			  $filters,
			  { duration: 1000 },
			  gallery
			  );
		});

		$(document).ready(gallery);
		</script>


		


</body>
</html>




