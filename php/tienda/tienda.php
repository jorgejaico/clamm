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
		<link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="../../css/patros.css" >
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
	<?php
	include("../conexion/conexion.proc.php");
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
							 header("Location: tienda.php");
							 die();
						 } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
							 $pagina = $_GET["pagina"];
						};

					 } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
						 header("Location: tienda.php");
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
		$obtener_todo_BD = "SELECT tbl_publicacion.*, tbl_anuncio.*, CURRENT_DATE() AS Fecha 
			FROM tbl_publicacion 
			INNER JOIN tbl_anuncio ON tbl_publicacion.anuncio_publicacion = tbl_anuncio.id_anuncio 
			WHERE tbl_publicacion.fechainicio_publicacion <= CAST(CURRENT_DATE() AS date) 
			AND tbl_publicacion.fechafinal_publicacion >= CAST(CURRENT_DATE() AS date)";
		//Realiza la consulta
		$consulta_todo = mysqli_query($con, $obtener_todo_BD);

		//Cuenta el número total de registros
		$total_registros = mysqli_num_rows($consulta_todo);

		//Obtiene el total de páginas existentes
		$total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina);
		//Realiza la consulta en el orden de ID ascendente (cambiar "id" por, por ejemplo, "nombre" o "edad", alfabéticamente, etc.)
		//Limitada por la cantidad de cantidad por página
			$consulta_resultados = mysqli_query($con,"
			SELECT tbl_publicacion.*, tbl_anuncio.*, CURRENT_DATE() AS Fecha 
			FROM tbl_publicacion 
			INNER JOIN tbl_anuncio ON tbl_publicacion.anuncio_publicacion = tbl_anuncio.id_anuncio 
			WHERE tbl_publicacion.fechainicio_publicacion <= CAST(CURRENT_DATE() AS date) 
			AND tbl_publicacion.fechafinal_publicacion >= CAST(CURRENT_DATE() AS date) 
			ORDER BY tbl_publicacion.fechainicio_publicacion DESC");
	// Paginación Final Inicio BODY
	?>

		
			
		<!-- Page Content -->

		
		<section id="noticias">
			<div class="container">
				<div class="text-center"><h2>Catalogo</h2>
					<img class="img-responsive displayed" src="../../images/short.png" alt="noticias">
				</div>
			<!-- Principio Tientda -->
				<div class="row">
				<h5>Tienda 1</h5>
				<hr>
					<div class="col-md-12 homeport1">

				<!-- Principio Anuncio -->
				<?php 
					while ($prod = mysqli_fetch_array($consulta_resultados)){
				?>
					<div class="col-md-3 col-sm-6 col-xs-12 portfolio-item">
					<div class="contenedorcatalogo">
							
									<img class="img-responsive" src="../../images/<?php echo $prod['imagen_anuncio'] ?>" alt="photo">								
									<h3><?php echo utf8_encode($prod['titulo_anuncio']); ?></h3>      
							
							<p class="text-center"><?php echo utf8_encode($prod['texto_anuncio']); ?></p>
							<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom" href="<?php echo $prod['enlace_anuncio'] ?>"">Read More</a></div>
						</div></div>

				<?php
					}
				?>
					<!-- Final Anuncio -->
				
					</div>
				</div>
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
			<!-- Final Tienda -->
			</div>
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




