<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/style.css">
        <title>Tarjeta de Observación</title>
    </head>  
    <body>
        <div class="contenedor">
        
            <form action="php/carga.php" method="POST">
            
            <h1>Tarjeta de Observacion del entorno</h1>

            <h3>TIPO DE SITUACIÓN</h3>
            <b>Acto inseguro:</b> Acciones y decisiones humanas, que pueden causar una situación insegura, accidente o enfermedad, 
                    con consecuencias para el trabajador, la producción, el medio ambiente y/u otras personas <br>

            <b>Condición insegura: </b> Es todo un equipo, materia prima, herramientas, máquinas, instalaciones o el medio ambiente
                    que se convierte en un peligro para las personas, los bienes, la operación que bajo determinadas condiciones puede generar un accidente o una enfermedad.<br>

            <b>Incidente de Trabajo:</b> Suceso sucedido en el trabajo , que tuvo el potencial de ser un accidente, en el que hubo 
            personas involucradas sin que sufrieran lesiones o se presentaran daño a la propiedad y/o pérdida de los procesos.<br>

            <b>Incidente Ambiental: </b> Evento que bajo condiciones no controladas puede llevar a un accidente ambiental generando 
            pérdidas e impactos negativos sobre uno o varios elementos del Medio Ambiente.<br><br>
            <hr>
            <h3>DATOS GENERALES</h3>

            <label for="regional">Dirección General/Regional:</label>
            <select name="regional" required>
                <option value="" selected>Cundinamarca</option>
            </select>
            <label for="centro">Despacho Regional/Centro de Formación:</label>
            <select name="centro" required>
                <option value="" disabled selected>Centro de Biotecnologia Agropecuaria (CBA)</option>
            </select>
            <label for="ciudad">ciudad:</label>
            <select name="ciudad" required>
                <option value="" disabled selected>Mosquera</option>
            </select>
            <br>
            <label for="lugar">Lugar de identificación de la situación:</label>
            <select name="lugar" required>
                <option value="" disabled selected>Auditorio</option>   
                <option value="lugar">Administracion</option>
                <option value="lugar">Biblioteca</option>
                <option value="lugar">Bloque A</option>
                <option value="lugar">Bloque B</option>
                <option value="lugar">Bloque C</option>
                <option value="lugar">Bloque D</option>
            </select>
            Fecha:<input type="date" name="fecha" class="f" required>
            <br>
            <label for="remitente">Nombre de quien reporta:</label>
            <select name="remitente" required>
                <option value="" disabled selected>Aprendiz</option>
                <option value="remitente">Instructor</option>
                <option value="remitente">Funcionario</option>
                <option value="remitente">Brigadista</option>
            </select>       


            <br><br>
            <h3>TIPO DE SITUACIÓN</h3>
            <h4>Marque la opcion que corresponda</h4>
            <input type="radio" id="1opcion" name="tipo" value="Acto Inseguro" required><label for="1opcion">Acto Inseguro</label>
            <input type="radio"  id="2opcion" name="tipo" value="Condición Insegura"  required><label for="2opcion">Condición Insegura</label>
            <input type="radio"  id="3opcion" name="tipo" value="Incidente De Trabajo" required> <label for="3opcion">Incidente De Trabajo</label>
            <input type="radio"  id="4opcion" name="tipo" value="Incidente Ambiental" required><label for="4opcion">Incidente Ambiental</label>
 
 
            <br><br>
            <h3>DESCRIPCIÓN DE LA SITUACIÓN</h3>
            <label>
            Describa detalladamente la situación observada, indicado si la persona involucrada es empleado 
                o visitante, relacionando las consecuencias que puedan generarse <br>
            <input type="text" id="descripcion" name="descripcion" class="descripcion" required>
            </label>
            <br>
            <h3>IMAGEN</h3>
            <label for="imagen">Adjuntar imagen:</label>
            <label>
                Por favor adjunte una imagen de la situacion que anteriormente describio (En caso de no tener imagen por favor omita este campo).
            </label>
            <br><br>
            <input type="file" id="imagen" name="imagen">
            <br><br>
            <input type="submit">
            </form>
        </div>
    </body>
</html>
