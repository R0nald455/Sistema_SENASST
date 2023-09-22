<!DOCTYPE html>
<html>
<head>
    <title>QR</title>
    <link rel="stylesheet" href="CSS/Style.css">
</head>
  <body>
  <header>
    <a href="../php/rolpersona/indexpersona.php"><img src="Imagen/LogoSena.png" alt="logosena"></a>
    <h1>QR</h1>
    </header>
  <main>
	<br>
	<br>
	<br>
	<br>
	<center>
  <div class="titel">
  <p>Sistemas 1<span>&#10003;</span></p>
</div>
<table class="table-fill">

<thead>
	<tr>
	<th class="text-left">Inventario</th>
	<th class="text-left">Cantidad</th>
	</tr>
</thead>
<tbody class="table-hover">
<tr>
<?php
include("../db/conexion.php");
// Ejecuta una consulta
$query = "SELECT articulo, cantidad FROM inventariosalon";
$result = $conexion->query($query);



// Itera sobre los resultados
while ($row = $result->fetch_assoc()) {
	echo "<td class='text-left'>". $row["articulo"]. "</td>" . " " . "<td class='text-left'>". $row["cantidad"]. "</td>" ."</tr>";
}

// Cierra la conexión
$conexion->close();

?>
</tr>
</tbody>
</table>
<br>
<a href="./Modelo3D/BloqueD.html">
	<button class="custom-btn ">Ver modelo 3D del bloque</button>
</a>
  </main>
</body>
</html>
