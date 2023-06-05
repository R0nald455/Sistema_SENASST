<!DOCTYPE html>
<html lang="es">
<head>
<title>Seguridad SENA</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
</head>

<body>


<!-- Menu de navegacion-->
<div class="navbar navbar-default navbar-fixed-top sticky-navigation" role="navigation">
	<div class="container">
		<div class="navbar-header">
			
			<a href="#" class="navbar-brand"><img src="img/LogoSena.png" height="60px" alt=""></a>
		</div>
			<ul class="nav navbar-nav navbar-right main-navigation">
				<li><a href="#inicio" >Inicio</a></li>
				<li><a href="#brigadista" >Brigadistas</a></li>
				<li><a href="" >Reglamento</a></li>
				<li><a href="#price" >Reportar</a></li>
				<li><a href="#testimonial" >Noticias</a></li>
			</ul>
		</div>
	</div>
</div>

<!-- Inicio-->
<section id="overview" >
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-12">
				<img src="img/LogoSena.png" height=200px class="img-responsive" alt="sst">
			</div>
			<div class="wow fadeInUp col-md-4 col-sm-12" data-wow-delay="1s">
				<div class="overview-detail">
					<h2>SENASST</h2>
					<p>Nuestro sistema  de seguridad SENASST te permite consultar 
						y de manera eficiente elementos de seguridad y ubicación, garantizando un entorno seguro y protegido para nuestros aprendices, intructores y funcionarios.</p>
					<a onclick="window.location.href='php/login.php'" class="btn btn-default smoothScroll">Iniciar Sesion</a>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Brigadistas-->
<section id="trainer" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="wow fadeInUp col-md-12 col-sm-12" >
				<h2>Nuestro Brigradistas</h2>
				<p>Nuestros brigadistas siempre están a tu disposición, asegurando la seguridad en todo momento.</p>
			</div>

			<div class="wow fadeInUp col-md-4 col-sm-6" >
				<div class="trainer-thumb">
					<img src="img/brigadita.jpg" class="img-responsive" alt="Brigadista">
						<div class="trainer-overlay">
							<div class="trainer-des">
								<h2>Chaleco Naranja</h2>
							</div>
						</div>
				</div>
				<p>Siempre contaran con un chaleco naranja con el escudo</p>
			</div>
			<div class="wow fadeInUp col-md-4 col-sm-6" >
				<div class="trainer-thumb">
					<img src="img/brigadita.jpg" class="img-responsive" alt="Brigadista">
						<div class="trainer-overlay">
							<div class="trainer-des">
								<h2>Chaleco Naranja</h2>
							</div>
						</div>
				</div>
				<p>Siempre contaran con un chaleco naranja con el escudo</p>
			</div>
			<div class="wow fadeInUp col-md-4 col-sm-6" >
				<div class="trainer-thumb">
					<img src="img/brigadita.jpg" class="img-responsive" alt="Brigadista">
						<div class="trainer-overlay">
							<div class="trainer-des">
								<h2>Chaleco Naranja</h2>
							</div>
						</div>
				</div>
				<p>Siempre contaran con un chaleco naranja con el escudo</p>
			</div>
		</div>
	</div>
</section>


<!-- =========================
    NEWSLETTER SECTION   
============================== -->
<section id="newsletter" >
	<div class="container">
		<div class="row">
			<div class=" col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10" >
				<h2>Ayuda a tu seguridad</h2>
				<h4>Resporta los posibles riesgos para tu seguridad y salud</h4>
				<button type="button" class="btn btn-primary" onclick="window.location.href='php/login.php'">Reportar riesgo</button>
			</div>
		</div>
	</div>
</section>






<!-- =========================
    Seccion noticias y eventos proximos
============================== -->
<section id="testimonial">
	<div class="container">
		<div class="row">
			<h1>Noticias y eventos</h1>
			<p>				Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius,
				facere cupiditate libero corporis placeat quis quas ad aliquid sint
				perferendis odio consequatur vel sed velit cumque iure ex nam veniam.</p>

		</div>
	</div>
</section>


<!-- footer -->
<?php
include("Footer/footer.php");
?>
</body>
</html>