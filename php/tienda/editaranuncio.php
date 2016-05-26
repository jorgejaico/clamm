<!DOCTYPE html>
<html lang="en">

	<head>
		<?php session_start(); ?>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>CLAMM - Marca tendencia</title>
		<link href="../../css/bootstrap.min.css" rel="stylesheet">
		<link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../../css/patros.css" >
		<script src="val_registro.js"></script>
		<script> 
		
			return enviar;
		}
		</script>
				<?php
		//Conexion BDD 
			include("../conexion/conexion.proc.php");


		
		// Consulta nombre y descripcion del usuario 
			$sql= "SELECT tbl_anuncio.* FROM tbl_anuncio 
					WHERE id_anuncio = $_REQUEST[mdA]";




        

            $datos = mysqli_query($con, $sql);
            $prod = mysqli_fetch_array($datos);
           
		?>
	</head>

	<body data-spy="scroll">
		<!-- Navigation -->
	<?php
		include ("../headerfooter/header.php");
	?>

		
			
		<!-- Page Content -->

	
		<section id="contact">
			<div class="container"> 
				<div class="row">
					<div class="col-md-12">
						<div class="col-lg-12">
							<div class="text-center color-elements">
							<h2>Editar Anuncio</h2>
							</div>
						</div>
						
						<div class="col-lg-12 col-md-8">
							<form class="inline" method="post" enctype="multipart/form-data" action="../conexion/editaranuncio.proc.php?mdA=<?php echo $_REQUEST['mdA']?>"  onSubmit="return enviar;">
								<div class="row">
									<div class="col-sm-6 height-contact-element">
										<div class="form-group">
											<input type="text" name="titulo" placeholder="Titulo anuncio" class="form-control custom-labels" id="name" value="<?php echo $prod['titulo_anuncio']; ?>" required data-validation-required-message="Instroduce el titulo de tu anuncio"/>
											<p class="help-block text-danger"></p>
										</div>
									</div>
									<div class="col-sm-6 height-contact-element">
										<div class="form-group">
										<input type="text" name="enlace" placeholder="Enlace anuncio" class="form-control custom-labels" id="name" value="<?php echo $prod['enlace_anuncio']; ?>" required data-validation-required-message="Instroduce el enlace de tu anuncio"/>
											<p class="help-block text-danger"></p>
										</div>
									</div>
									<div class="col-sm-12 height-contact-element">
										<div class="form-group">
											<textarea name="desc" rows="2" maxlength="140" cols="50" class="form-control custom-labels" placeholder="Inroduce una descripción"><?php echo $prod['texto_anuncio']; ?></textarea>
										</div>
										<input type="file" name="foto">
									</div>
									<div class="col-sm-6 col-xs-6 height-contact-element">
										<div class="form-group">
											<button type="submit" class="btn btn-md btn-custom btn-noborder-radius" onClick="validatePassword()"/>Enviar</button>
										</div>
									</div>
									<div class="col-sm-3 col-xs-6 height-contact-element">
										<div class="form-group">
											<div id="response_holder"></div>
										</div>
									</div>
									<div class="col-sm-12 contact-msg">
									<div id="success"></div>
									</div>
								</div>
							</form>
						</div>
					
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


<!-- Footer -->
	<?php
		include ("../headerfooter/footer.php");
	?>

		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

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