<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>CLAMM - Marca tendencia</title>
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
			$sql ="SELECT * FROM `tbl_usuario` INNER JOIN tbl_anuncio ON tbl_usuario.id_usuario = tbl_anuncio.usuario_anuncio WHERE tbl_anuncio.activo_anuncio = 1 GROUP BY tbl_usuario.id_usuario ORDER BY RAND()";

			$datos = mysqli_query($con, $sql);
		?>


	</head>

	<body data-spy="scroll">
		<!-- Navigation -->
	<?php
		include ("../../php/headerfooter/header.php");
	?>

		
			
		<!-- Page Content -->

		
		<section id="noticias">
			<div class="container">
				<div class="text-center"><h2>Catalogo</h2>
					<img class="img-responsive displayed" src="../../images/short.png" alt="noticias">
				</div>
				<div class="row">
					<?php
				while ($prod = mysqli_fetch_array($datos)){

					$sql2 ="SELECT * FROM `tbl_usuario` INNER JOIN tbl_anuncio ON tbl_usuario.id_usuario = tbl_anuncio.usuario_anuncio WHERE tbl_anuncio.usuario_anuncio = $prod[id_usuario] AND tbl_anuncio.activo_anuncio = 1";
					$datos2 = mysqli_query($con, $sql2);


					?>
				<h5><?php echo $prod['usuario'] ?></h5>
				<hr>
					<div class="col-md-12 homeport1">
						<?php
							while ($prod2 = mysqli_fetch_array($datos2)){
						?>
					<div class="col-md-3 col-sm-6 col-xs-12 portfolio-item">

								<img src="../../images/blog1.jpg" alt="img09" class="img-responsive" />
								
									<h3><?php echo $prod2['titulo_anuncio'] ?></h3>      
							
							<p class="text-center"><?php echo $prod2['texto_anuncio'] ?></p>
							<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Read More</a></div>
						</div>

						<?php
							}
						?>


						
						
					</div>
				</div>



				<?php

				}
					?>

				?>





		</section>

		


	


		

		

		<!-- Footer -->
	<?php
		include ("../../php/headerfooter/footer.php");
	?>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Portfolio -->
		<script src="js/jquery.quicksand.js"></script>	    
	

		

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




