<?php
session_start();
error_reporting(0);
require_once ("../../db/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<title>Seguridad SENA</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="../../css/footer.css">
</head>


<body>

	<?php if(isset($_SESSION["id"]) ): ?>

<!-- Menu de navegacion-->

<div class="container__menu">

	<div class="menu">

		<input type="checkbox" id="check__menu">
		<label for="check__menu" class="lbl-menu">
			<span id="spn1"></span>
			<span id="spn2"></span>
			<span id="spn3"></span>
		</label>

		<img id="logoResponsive" src="../../img/LogoSenaBlanco.png"  width="50px" alt="logoSena">

		<nav>
			<ul>
				<li><img src="../../img/LogoSenaBlanco.png"  width="50px" alt="logoSena"></li>
				<li><a onclick="window.location.href='../../reglamento/index.php'" >Reglamento</a></li>
				<li><a onclick="window.location.href='../../tarjetaObservacion/index.php?session=1'" >Reportar</a></li>
				<li><a onclick="window.location.href='../../NormasJason/index.php'" >Normas</a></li>
				<li><a onclick="window.location.href='../../senaletica/index.php'" >Señaletica</a></li>
				<li><a onclick="window.location.href='../../quiz/index.php'" >quiz</a></li>
				<li><a onclick="window.location.href='../../QR/Modelo3DD/BloqueD.html'">Ver 3D</a></li>
                <li><a onclick="window.location.href='../cerrarSesion.php'" ><span class="material-symbols-outlined">logout</span></a></li>
			</ul>
		</nav>
	</div>
</div>

<!-- Inicio-->
<section id="overview" >
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12">
				<img src="../../img/LogoSena.png"  class="img-fluid w-100" alt="sst">
			</div>
			<div class="wow fadeInUp col-md-4 col-sm-12" data-wow-delay="1s">
				<div class="overview-detail">
					<h2>SENASST</h2>
					<p class="parrafo-landing">Hola!, <b><?= $_SESSION["documento"] ?> </b> te contamos que el sistema de seguridad y salud en el trabajo (SENASST) te permite consultar 
					 de manera eficiente elementos de seguridad y salud, garantizando un entorno seguro y protegido para nuestros aprendices, intructores y funcionarios.</p>
				</div>
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
				include_once '../../db/conexion.php';

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
include("../../footer/footer.php");
?>

<?php else:?>

<script>
	alert("No has iniciado sesión, por favor inicia a continuación.");
	window.location.href = "../login.php";
</script>

<?php endif; ?>
<script src="../js/confirmacion.js"></script>
</body>
</html>