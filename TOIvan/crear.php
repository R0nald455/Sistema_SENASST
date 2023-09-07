<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrearForm</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
    <style>
    body {
        background-color: #f8f8f8;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
  
        font-size: 16px;
        line-height: 1.6;
        color: #333;
    }

    h1 {
        font-size: 2em;
        text-align: center;
        margin-bottom: 1em;
        margin-top: 0.5em;
    }

    form {
        max-width: 40%;
        margin: 0 auto;
        padding: 1em;
        border: 2px solid #31cf18;
        border-radius: 10px;
        background-color: #fff;
    }

    input[type="text"], textarea {
        padding: 0.5em;
        width: 70%;
        height:15px;
        border: 1px solid #31cf18;
        border-radius: 5px;
        margin-bottom: 1em;
    }

    input[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;      
        }

    input[type="submit"]:hover {
            background-color: #1b7161;
            color: white;
        }  
        a {
        display: inline-block;
        padding: 10px;
        margin: 10px;
        border: 2px solid #4caf50;
        border-radius: 5px;
        color: #333;
        text-decoration: none;
        text-align: center; /* Centrar el texto */
        width: 80%; /* Ajustar el ancho */
        max-width: 200px; /* Establecer un ancho máximo */
      }

      /* Estilos para el enlace en hover */
      a:hover {
        background-color: #4caf50;
        color: #fff;
      }
</style>
</head>
<body>
    <center>
    <h1> Tarjeta De Observación</h1>
<form action="LogProf.php"  method="post" enctype="multipart/form-data">



<p>Nombre del Usuario<br>
<input type="text" type="text" REQUIRED placeholder="ingrese su nombre" name="names"></p>

<p>Identificación del riesgo <br>
<table>
        <tr>
           <td colspan=3>
               <!-- Añadido onchange para cargar los riesgos -->
               <select name="riesgo" id="riesgo" onchange="cargarCondicion();" onclick="showContent()" >
                   <!-- Hay que terminar los options -->
                   <!-- 
                        Eliminado de value la llamada a la función,
                        si eso funciona lo desconocía, y aunque 
                        lo haga es totalmente innecesario, 
                        lo correcto es usar el evento onchange 
                     -->
                   <option value="">Seleccione un Riesgo...</option>
               </select>
           </td>
       </tr>
       <tr>                    
           <td colspan=3>
               <select name="condicion" id="condicion" style="display: none">
                   <!-- Hay que terminar los options -->
                   <!-- 
                        Eliminado de value la llamada a la función,
                        si eso funciona lo desconocía, y aunque 
                        lo haga es totalmente innecesario, 
                        lo correcto es usar el evento onchange 
                     -->
                   <option value="">Defina el riesgo...</option>
               </select>
           </td>
       </tr>
     </table>



    

<!--
<p>Video de la condiciòn insegura<input type="text" REQUIRED placeholder="sub un videomostrando la con" name="video" size="30"></p>
-->
<p>¿Área donde observó el riesgo? <br><br>
<select id="contexto" name="contexto" onchange="mostrarOtro()">
            <option selected>Seleccione</option>
            <option value="Auditorio">Auditorio</option>
            <option value="Administración">Administración</option>
            <option value="Bloque A">Bloque A</option>
            <option value="Bloque B">Bloque B</option>
            <option value="Bloque C">Bloque C</option>
            <option value="Biblioteca">Biblioteca</option>
            <option value="Coliseo">Coliseo</option>
            <option value="Cafetería">Cafetería</option>
            <option value="otro">Otro</option>
        </select>
        <div id="otroRiesgo" style="display: none;">
            <label for="otroRiesgoInput">En que parte:</label>
            <input type="text" id="otroRiesgoInput" name="otroRiesgoInput">
        </div></p>
<p>¿Que tan peligroso cree que es?<br>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="situacion" id="inlineRadio1" value="Alto">
  <label class="form-check-label" for="inlineRadio1">Alto</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="situacion" id="inlineRadio2" value="Medio">
  <label class="form-check-label" for="inlineRadio2">Medio</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="situacion" id="inlineRadio3" value="Bajo" >
  <label class="form-check-label" for="inlineRadio3">Bajo</label>
</div>


<p>Imagen del riesgo
    <br><br>
     <input type="file" 
     REQUIRED  name="imagen"></p>
     
<input type="submit" value="Subir" href="ProfIni.php">

</form> 
<br>
    <a href="ProfIni.php">Volver</a>
</center>
<script src="script.js"></script>
    <script src="script2.js"></script>
</body>
</html> 