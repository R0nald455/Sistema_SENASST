<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Seguridad SENA</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=Edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/footer.css">
	</head>

<body>


<!-- Menu de navegacion-->
<div class="navbar navbar-default navbar-fixed-top sticky-navigation" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a href="#" class="navbar-brand"><img src="img/LogoSena.png"  width="50px" alt="logoSena"></a>
		</div>
			<ul class="nav navbar-nav navbar-right main-navigation">
				<li><a href="#overview" >Inicio</a></li>
				<li><a href="#trainer" >Brigadistas</a></li>
				<li><a href="php/login.php" >Reglamento</a></li>
				<li><a href="#newsletter" >Reportar</a></li>
				<li><a href="#testimonial" >Noticias</a></li>
			</ul>
		</div>
	</div>
</div>

<!-- Inicio-->
<section id="overview" >
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<img src="img/LogoSena.png"  class="img-fluid w-100" alt="sst">
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
				<h2>Nuestros Brigradistas</h2>
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
				<p>Identificalos ellos siempre contaran con un chaleco naranja</p>
			</div>
			<div class="wow fadeInUp col-md-4 col-sm-6" >
				<div class="trainer-thumb">
				<button class="UbicarBrigadista"><a onclick="window.location.href='php/login.php'">Alerta a un Brigadista</a></button>
				</div>
			</div>
			<div class="wow fadeInUp col-md-4 col-sm-6" >
				<div class="trainer-thumb">
					<img src="img/capacitacion.jpg" id="imagenCapacitacion"  class="img-responsive" alt="Brigadista">
						<div class="trainer-overlay">
							<div class="trainer-des">
								<h2>Capacitados</h2>
							</div>
						</div>
				</div>
				<p>Se encuentran capacitados para actuar ante cualquier situación</p>
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
				<h2>!Contribuye a hacer de un sena más seguro!</h2>
				<h4>Reporta los posibles riesgos para tu seguridad y salud</h4>
				<button class="botonReportar" onclick="window.location.href='php/login.php'"><b>Reportar riesgo</b></button>
			</div>
		</div>
	</div>
</section>



<!-- =========================
    Seccion soporte
============================== -->

<section id="soporte">
	<div id="container-soporte">
		<div id="titulo-container">
			<h2 class="titulo-soporte">Ayuda y Soporte</h2>
			<img src="img/soporte.jpg" alt="soporte">
		</div>

		<form class="form-soporte" id="contact-form" action="soporte/script_soporte.php" method="POST">

		<div class="row">

			<div class="items form-group col-md-6">
				<label class="label-soporte" for="nombre">Nombre:
					<input class="input-soporte form-control" type="text" id="nombre" name="nombre" required autocapitalize="words">
				</label>
			</div>

			<div class="items form-group col-md-6">
				<label class="label-soporte" for="apellido">Apellido:
					<input class="input-soporte form-control" type="text" id="apellido" name="apellido" required autocapitalize="words">
				</label>
			</div>

		</div>

			<div class="items form-group">
				<label class="label-soporte" for="email">Correo electrónico:
					<input class="input-soporte form-control" type="email" id="email" name="email" required>
				</label>
			</div>

			<div class="items form-group">

				<label class="label-soporte" for="asunto">Asunto:
					<select name="asunto" id="asunto" class="form-control">
						<option value="Comentario">Comentario</option>
						<option value="Sugerencia">Sugerencia</option>
						<option value="Reclamo">Reclamo</option>
					</select>
				</label>

			</div>

			<div class="items form-group">
				<label class="label-soporte" for="mensaje">Mensaje:
					<textarea class="textarea-soporte form-control" id="mensaje" name="mensaje" style="resize: none; height: 100px;" required></textarea>
				</label>
			</div>

			<button class="submit-soporte btn btn-success" type="submit" value="Enviar">Enviar</button>
		</form>
	</div>
			
    </section>

<!-- =========================
    Seccion noticias y eventos proximos
============================== -->
	<section id="testimonial">
		<div class="container">
			<div class="row">
				<h1>Noticias y eventos</h1>
			</div>
			<div class="col-md-12">	
			<?php
				include_once 'db/conexion.php';

				$result = $conexion->query("SELECT id,titulo,descripcion,creado FROM publicaciones ");

				while($fila=$result->fetch_assoc()){
					$fecha=new DateTime($fila['creado']);
					$fechaPublicacion=$fecha->format('Y-m-d');
					echo" 
					<div class='card'>
					<div class='mb-12'>
					<span>".$fila['titulo']."</span>
					<h5 class='fecha'>Publicado el: ".$fechaPublicacion." </h5>
					
					</div>
					</div>
					<center>
					<img src='http://localhost/Sistema_SENASST/php/consultarImagen.php?id=".$fila['id']."'  class='img-responsive'  alt='Imagen'>
					</center><br>

					<div class='mb-3'>
					<p>".$fila['descripcion']."</p>
					</div>
					<hr>
					";
				}
			?>
			
		</div>
	</div>
</section>

<!-- footer -->
<?php
include("footer/footer.php");
?>
</body>
</html>