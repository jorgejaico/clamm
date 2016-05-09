
<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img src="images/logo.png" alt="company logo" /></a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right custom-menu">
						<li class="active"><a href="#home">Home</a></li>
						<li><a href="#noticias">Noticias</a></li>
						<li><a href="#contact">Contacto</a></li>
						<li><a href="blog.html">Blogs</a></li>
						<li><a href="#">Tienda</a></li>
						<li><a href="single-post.html">Single</a></li>
						
						
					</ul>
					<?php 
					if(!isset($_SESSION['mail'])){
						include ("/php/cuentas/login.php"); 
					}else{
						echo "Bienvenido, ".$_SESSION['nombre'];
						echo "<a href='php/conexion/logout.php'>Logout</a>";
					}
						?>
				</div>
			</div>

		</nav>