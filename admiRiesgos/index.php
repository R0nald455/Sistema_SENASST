<?php
session_start();
error_reporting(0);
require_once ("../db/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admiRiesgos.css">
    <link rel="stylesheet" href="../css/header-modulos.css">
    <title>Administrador de contenidos</title>
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

		<img id="logoResponsive" src="../img/LogoSenaBlanco.png"  width="50px" alt="logoSena">


		<nav>
			<ul>
				<li><img src="../img/LogoSenaBlanco.png"  width="50px" alt="logoSena"></li>
				<li><a href="../php/rolFuncionario/indexFuncionario.php" id="selected">Inicio</a></li>
					<li><a onclick="window.location.href='../php/rolFuncionario/indexFuncionario.php'"><span class="material-symbols-outlined">Salir</span></a></li>
			</ul>
		</nav>
	</div>
</div>
<div class="container mt-4">
    <div class="row justify-content-center">

                <div class="card">        
                    <table id="data-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Fecha</th>
                            <th>Lugar</th>
                            <th>Estado</th>
                            <th>Tipo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php include 'mostrar_datos.php'; ?>
                        </tbody>
                    </table>
                </div>
            </div>



    <!-- Formulario de actualización de estado de un riesgo -->
<!-- <div id='formulario'>
  <h2>Formulario</h2>
  <form>
  <?php include 'mostrar_datos.php'; ?>
    <button type='submit'>Enviar</button>
  </form>
  <button id='cerrarFormulario'>Cerrar</button>
</div>
</div> -->






<?php
include '../Footer/footer.php';
?>
<!-- <script>
  const botonMostrarFormulario = document.getElementById('mostrarFormulario');
  const botonCerrarFormulario = document.getElementById('cerrarFormulario');
  const formulario = document.getElementById('formulario');

  botonMostrarFormulario.addEventListener('click', () => {
    formulario.style.display = 'block';
  });

  botonCerrarFormulario.addEventListener('click', () => {
    formulario.style.display = 'none';
  });
</script>
 -->


<?php else:?>

<script>
    alert("No has iniciado sesión, por favor inicia a continuación.");
    window.location.href = "../../../php/login.php";
</script>

<?php endif; ?>

</body>
</html>