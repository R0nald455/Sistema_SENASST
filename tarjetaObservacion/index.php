    <!DOCTYPE html>
    <html>
    <head>
        <title>Tarjeta de Observación</title>
        <link rel="stylesheet" href="../css/style_TO.css">
        <link rel="stylesheet" href="../css/header.css">
        
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

            <a href="../php/rolPersona/indexPersona.php"><img id="logoResponsive" src="../img/LogoSenaBlanco.png"  width="50px" alt="logoSena"></a>
            

            <nav>
                <ul>
                    
                    <li><a href="../php/rolPersona/indexPersona.php"><img src="../img/LogoSenaBlanco.png"  width="50px" alt="logoSena"></a></li>
                    <li><a href="#overview" id="selected">Inicio</a></li>
                    <li><a href="#trainer">Brigadistas</a></li>
                    <li><a href="php/login.php">Reglamento</a></li>
                    <li><a href="#newsletter">Reportar</a></li>
                    <li><a href="#testimonial">Noticias</a></li>
                </ul>
            </nav>
        </div>
        </div>

        <div class="contenedorTO">
            <form   method="POST" action="php/insertar.php" id="formulario" autocomplete="off">
                
                <h1>Tarjeta de Observación del Entorno</h1>
                
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
                            <label for="regional">General/Regional:</label>
                            <input type="text" name="diregional" id="diregional" required>
                        </div>
                        <div>
                            <label for="centro">Centro de Formación:</label>
                            <input type="text" name="desregional" id="desregional" required>
                        </div>
                        <div>
                            <label for="direccion">Dirección de la Sede o subsede:</label>
                            <input type="text" name="dirsede" id="dirsede" required>
                        </div>
                        <div>
                            <label for="ciudad">Ciudad:</label>
                            <input type="text" name="ciudad" id="ciudad" required>
                        </div>
                        <div>
                            <label for="lugar">Lugar de identificación de la situación:</label>
                            <input type="text" name="lugariden" id="lugariden" required>
                        </div>
                        <div>
                            <label for="fecha">Fecha:</label>
                            <input type="date" name="fecha" id="fecha" class="f" required>
                        </div>
                        <div>
                            <label for="remitente">Nombre de quien reporta:</label>
                            <input type="text" name="nomreporta" id="nomreporta" required>
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
                    <input type="radio" id="actinseguro" name="actinseguro" value="Acto Inseguro" required>
                    <label for="actinseguro">Acto Inseguro</label><br>
                    <input type="radio" id="coninsegura" name="actinseguro" value="Condición Insegura" required>
                    <label for="coninsegura">Condición Insegura</label><br>
                    <input type="radio" id="inctrabajo" name="actinseguro" value="Incidente De Trabajo" required>
                    <label for="inctrabajo">Incidente De Trabajo</label><br>
                    <input type="radio" id="incambiental" name="actinseguro" value="Incidente Ambiental" required>
                    <label for="incambiental">Incidente Ambiental</label><br>
                </div>
            </div>

                <div class="seccion">
                    <h2>DESCRIPCIÓN DE LA SITUACIÓN</h2>
                    <textarea id="desituacion" name="desituacion" class="descripcion" required></textarea>
                </div>

                <div class="seccion">
                    <h2>IMAGEN</h2>
                    <label for="imagen">Adjuntar imagen:</label>
                    <p>Por favor adjunte una imagen de la situación que anteriormente describió (En caso de no tener imagen por favor omita este campo).</p>
                    <input type="file" id="imagen" name="imagen">
                    
                </div>

                <div class="submitBoton">
                    <input type="submit" value="Enviar" class="submit" id="submit" name="submit">
                </div>
                
            </form>
        </div>
    </body>
    </html>
