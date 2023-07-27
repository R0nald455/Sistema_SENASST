<!DOCTYPE html>
<html>
<head>
    <title>Tarjeta de Observación</title>
    <link rel="stylesheet" href="../css/style_TO.css">
</head>
<body>
    <header>
    <a href="../php/rolPersona/indexPersona.php"><img src="../img/LogoSena.png" alt="logosena"></a>
    <h1>Tarjeta de Observación del Entorno</h1>
    </header>

    <div class="contenedor">
        <form action="php/carga.php" method="POST" id="formulario">
            
            <div class="seccion">
                <h2>TIPO DE SITUACIÓN</h2>
                <ul>
                    <li><b>Acto inseguro:</b> Acciones y decisiones humanas, que pueden causar una situación insegura, accidente o enfermedad,
                        con consecuencias para el trabajador, la producción, el medio ambiente y/u otras personas.</li>
                    <li><b>Condición insegura:</b> Es todo un equipo, materia prima, herramientas, máquinas, instalaciones o el medio ambiente
                        que se convierte en un peligro para las personas, los bienes, la operación que bajo determinadas condiciones puede generar un accidente o una enfermedad.</li>
                    <li><b>Incidente de Trabajo:</b> Suceso sucedido en el trabajo, que tuvo el potencial de ser un accidente, en el que hubo
                    personas involucradas sin que sufrieran lesiones o se presentaran daño a la propiedad y/o pérdida de los procesos.</li>
                    <li><b>Incidente Ambiental:</b> Evento que bajo condiciones no controladas puede llevar a un accidente ambiental generando
                        pérdidas e impactos negativos sobre uno o varios elementos del Medio Ambiente.</li>
                </ul>
            </div>
            <hr>

            <div class="seccion">
                <h2>DATOS GENERALES</h2>
                <div class="datos-generales">
                    <div>
                        <label for="regional">Dirección General/Regional:</label>
                        <input type="text" name="regional" id="regional" required>
                    </div>
                    <div>
                        <label for="centro">Despacho Regional/Centro de Formación:</label>
                        <input type="text" name="centro" id="centro" required>
                    </div>
                    <div>
                        <label for="direccion">Dirección de la Sede o subsede:</label>
                        <input type="text" name="direccion" id="direccion" required>
                    </div>
                    <div>
                        <label for="ciudad">Ciudad:</label>
                        <input type="text" name="ciudad" id="ciudad" required>
                    </div>
                    <div>
                        <label for="lugar">Lugar de identificación de la situación:</label>
                        <input type="text" name="lugar" id="lugar" required>
                    </div>
                    <div>
                        <label for="fecha">Fecha:</label>
                        <input type="date" name="fecha" id="fecha" class="f" required>
                    </div>
                    <div>
                        <label for="remitente">Nombre de quien reporta:</label>
                        <input type="text" name="remitente" id="remitente" required>
                    </div>
                    <div>
                        <label for="cargo">Cargo:</label>
                        <input type="text" name="cargo" id="cargo" required>
                    </div>
                </div>
            </div>
            
            <div class="seccion">
                <h2>TIPO DE SITUACIÓN</h2>
                <div class="radio-buttons">
                    <input type="radio" id="1opcion" name="tipo" value="Acto Inseguro" required>
                    <label for="1opcion">Acto Inseguro</label><br>
                    <input type="radio" id="2opcion" name="tipo" value="Condición Insegura" required>
                    <label for="2opcion">Condición Insegura</label><br>
                    <input type="radio" id="3opcion" name="tipo" value="Incidente De Trabajo" required>
                    <label for="3opcion">Incidente De Trabajo</label><br>
                    <input type="radio" id="4opcion" name="tipo" value="Incidente Ambiental" required>
                    <label for="4opcion">Incidente Ambiental</label><br>
                </div>
            </div>

            <div class="seccion">
                <h2>DESCRIPCIÓN DE LA SITUACIÓN</h2>
                <textarea id="descripcion" name="descripcion" class="descripcion" required></textarea>
            </div>

            <div class="seccion">
                <h2>IMAGEN</h2>
                <label for="imagen">Adjuntar imagen:</label>
                <p>Por favor adjunte una imagen de la situación que anteriormente describió (En caso de no tener imagen por favor omita este campo).</p>
                <input type="file" id="imagen" name="imagen">
            </div>
            
            <div class="submit-button">
                <input type="button" value="Enviar" class="Enviar">
            </div>
        </form>
    </div>
</body>
</html>
