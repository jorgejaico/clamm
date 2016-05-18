<?php
		$index = "/php/";
		$url_actual = $_SERVER["REQUEST_URI"];
		$resultado = strpos($url_actual, $index);
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
						<?php
					if ($resultado == FALSE){
						?>
						<a class="navbar-brand" href="index.php">
						<?php 
					}else{
						?>
						<a class="navbar-brand" href="../../index.php">
						<?php
					}
						?>


					<?php
				if ($resultado == FALSE){
						echo "<img src='images/logo.png' alt='company logo' />";
					?>
						
						</a>
				</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right custom-menu">
							<li class="active"><a href="#home">Home</a></li>
							<li><a href="#noticias">Noticias</a></li>
							<li><a href="#contact">Contacto</a></li>
							<li><a href="php/blogArticulo/blog.php">Blogs</a></li>
							<li><a href="php/articulos/selecionarticulo.php">Articulos</a></li>
							<li><a href="php/perfil/bloggers.php">Bloggers</a></li>
							<li><a href="php/tienda/tienda.php">Tienda</a></li>			
						</ul>
					<?php
				}else{
						echo "<img src='../../images/logo.png' alt='company logo' />";
					?>
						</a>
				</div>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right custom-menu">
							<li><a href="../../">Home</a></li>
							<li><a href="blog.html">Blogs</a></li>
							<li><a href="../articulos/selecionarticulo.php">Articulos</a></li>
							<li><a href="../perfil/bloggers.php">Bloggers</a></li>
							<li><a href="../tienda/tienda.php">Tienda</a></li>			
						</ul>
					<?php
						}
						?>
					
					<div class="logout">
					<?php
					if ($resultado == FALSE){ 
						if(!isset($_SESSION['mail'])){
							include ("php/cuentas/login.php"); 
						}else{
							echo "Bienvenido, ".$_SESSION['nombre'];
							echo "<a href='php/conexion/logout.php'>Logout</a>";
						};
					}else{
						if(!isset($_SESSION['mail'])){
							include ("../cuentas/login.php"); 
						}else{
							echo "Bienvenido, ".$_SESSION['nombre'];
							echo "<a href='../conexion/logout.php'>Logout</a>";
						};		
					}
						?>
						</div>
				</div>
			</div>

		</nav>