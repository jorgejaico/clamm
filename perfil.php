<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>CLAMM - Mi Perfil</title>
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="css/patros.css" >
		<link rel="stylesheet" href="css/perfil.css" >
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
	</head>

	<body data-spy="jumbotron">
		<!-- Navigation -->


	<?php
		include ("php/headerfooter/header.php");
	?>



			
		<!-- Page Content -->
		<div class="contenedor">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-sx-12">
            <div class="current-profile">
                <div class="user-bg" style="background-color: grey "</div>
                <div class="user-pic" style="background: url(http://bootdey.com/img/Content/user_3.jpg) no-repeat">&nbsp;</div>
                <div class="user-details">
                    <h4 class="user-name">Camilo<i>!</i></h4>
                    <h5 class="description">Hi, I'm UI Designer from Canada. I like to design web and mobile applications that look good and work well.</h5>
                    <br>
                </div>
                <div class="social-list">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-3">
                            <div class="contadores">

                                <div class="col-md-3 col-sm-3 col-xs-3 center-align-text">
                                    <h3>2359</h3>
                                    <small>Posts</small>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3 center-align-text">
                                    <h3>7315</h3>
                                    <small>Likes</small>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="articulos">
			<div class="container">
				<div class="text-center"><h2>Blogs de...</h2>
					<img class="img-responsive displayed" src="images/short.png" alt="noticias">
				</div>
				<div class="row">
					<div class="col-md-12 homeport1">
						<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item">
							<figure class="effect-oscar">
								<img src="images/blog1.jpg" alt="img09" class="img-responsive" />
								<figcaption>
									<h2>Blog Post Long Title</h2>
									<a href="#">View more</a>
								</figcaption>           
							</figure>
							<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet.</p>
							<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Read More</a></div>
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item">
							<figure class="effect-oscar">
								<img src="images/blog2.jpg" alt="img09" class="img-responsive"/>
								<figcaption>
									<h2>Blog Post Long Title</h2>
									<a href="#">View more</a>
								</figcaption>           
							</figure>
							<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet.</p>
							<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Read More</a></div>
						</div>
						<div class="col-md-4 col-sm-12 col-xs-12 portfolio-item">
							<figure class="effect-oscar">
								<img src="images/blog3.jpg" alt="img09" class="img-responsive"/>
								<figcaption>
									<h2>Blog Post Long Title</h2>
									<a href="#">View more</a>
								</figcaption>           
							</figure>
							<p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet.</p>
							<div class="text-center"><a class="btn btn-primary btn-noborder-radius hvr-bounce-to-bottom">Read More</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<!-- Footer -->


	<?php
		include ("php/headerfooter/footer.php");
	?>
		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>


</body>
</html>




