<!DOCTYPE html>
<html lang="es">

<head>
	<title>SENASST</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/footer.css">
	<link rel="icon" href="img/LogoSena.png">
</head>

<body>


	<!-- Menu de navegacion-->

	<div class="container__menu">

		<div class="menu">

			<input type="checkbox" id="check__menu">
			<label for="check__menu" class="lbl-menu">
				<span id="spn1"></span>
				<span id="spn2"></span>
				<span id="spn3"></span>
			</label>

			<img id="logoResponsive" src="img/LogoSenaBlanco.png" width="50px" alt="logoSena">

			<nav>
				<ul>
					<li><img src="img/LogoSenaBlanco.png" width="50px" alt="logoSena"></li>
					<li><a href="#overview" id="selected">Inicio</a></li>
					<li><a href="#trainer">Alertar brigadistas</a></li>
					<li><a href="#newsletter">Reportar riesgo</a></li>
					<li><a href="#simuladores">Simuladores</a></li>
					<li><a href="reglamento/index.php">Reglamento</a></li>
					<li><a href="#testimonial">Noticias</a></li>
				</ul>
			</nav>
		</div>
	</div>

	<!-- Inicio-->
	<section id="overview">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-12">
					<img src="img/LogoSena.png" class="img-fluid w-100" alt="sst">
				</div>
				<div class="wow fadeInUp col-md-4 col-sm-12" data-wow-delay="1s">
					<div class="overview-detail">
						<h2>SENASST</h2>
						<p class="parrafo-landing">El sistema de seguridad y salud en el trabajo (SENASST) te permite
							consultar
							de manera eficiente elementos de seguridad y salud, garantizando un entorno seguro y
							protegido para nuestros aprendices, intructores y funcionarios.</p>
						<a onclick="window.location.href='php/login.php'" class="btn btn-default smoothScroll">Iniciar
							Sesion</a>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Brigadistas-->
	<section id="trainer" class="parallax-section">
		<div class="container">
			<div class="row">

				<div class="wow fadeInUp col-md-12 col-sm-12">
					<h2>Nuestros Brigadistas</h2>
					<p>Nuestros brigadistas siempre están a tu disposición, asegurando la seguridad en todo momento.</p>
				</div>

				<div class="wow fadeInUp col-md-4 col-sm-6">
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
				<div class="wow fadeInUp col-md-4 col-sm-6">
					<div class="trainer-thumb">
						<button class="UbicarBrigadista"><a onclick="window.location.href='personas/alertar.php'">Alerta
								a un Brigadista</a></button>
					</div>
				</div>
				<div class="wow fadeInUp col-md-4 col-sm-6">
					<div class="trainer-thumb">
						<img src="img/capacitacion.jpg" id="imagenCapacitacion" class="img-responsive" alt="Brigadista">
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
	<section id="newsletter">
		<div class="container">
			<div class="row">
				<div class=" col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
					<h2>!Contribuye a hacer de un sena más seguro!</h2>
					<h4>Reporta los posibles riesgos para tu seguridad y salud</h4>
					<button class="botonReportar" onclick="window.location.href='TOIvan/crear.php'"><b>Reportar
							riesgo</b></button>
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
				<h2 class="titulo-soporte">Buzon de Comentarios, Reclamos o Sugerencias</h2>
				<img src="img/soporte.jpg" alt="ImagenSoporte">
			</div>

			<form class="form-soporte" id="contact-form" action="soporte/script_soporte.php" method="POST">

				<div class="row">

					<div class="items form-group col-md-6">
						<label class="label-soporte" for="nombre">Nombre:
							<input class="input-soporte form-control" type="text" id="nombre" name="nombre" required
								autocapitalize="words">
						</label>
					</div>

					<div class="items form-group col-md-6">
						<label class="label-soporte" for="apellido">Apellido:
							<input class="input-soporte form-control" type="text" id="apellido" name="apellido" required
								autocapitalize="words">
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
						<textarea class="textarea-soporte form-control" id="mensaje" name="mensaje"
							style="resize: none; height: 100px;" required></textarea>
					</label>
				</div>

				<button class="submit-soporte btn btn-success" type="submit" value="Enviar">Enviar</button>
			</form>
		</div>

	</section>


	<!-- =========================
	Seccion simuladores
============================== -->
	<section id="simuladores">
		<div class="container">
			<div class="row">
				<div class=" col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10">
					<h2>!Descubre nuestros simuladores!</h2>
					<h4>Juega y diviértete</h4>
					<a href="gamesstt/index.php">
						<button class="botonReportar" href=""><b>Juega</b></button>
					</a>
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
			</div>
			<div class="col-md-12">
				<?php
				include_once 'db/conexion.php';

				$result = $conexion->query("SELECT id,titulo,descripcion,creado FROM publicaciones ORDER BY id DESC");

				while ($fila = $result->fetch_assoc()) {
					$fecha = new DateTime($fila['creado']);
					$fechaPublicacion = $fecha->format('Y-m-d');
					echo " 
					<div class='card'>
					<div class='mb-12'>
					<span>" . $fila['titulo'] . "</span>
					<h5 class='fecha'>Publicado el: " . $fechaPublicacion . " </h5>
					
					</div>
					</div>
					<center>
					<img src='https://cbaproy20.com/SenaSST/php/consultarImagen.php?id=" . $fila['id'] . "'  class='img-responsive'  alt='Imagen'>
					</center><br>

					<div class='mb-3'>
					<p>" . $fila['descripcion'] . "</p>
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
	include("Footer/footer.php");
	?>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="soporte/js/alert.js"></script>
</body>

</html>