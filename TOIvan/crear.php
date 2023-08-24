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

<select id="riesgo" name="condicion" onchange="mostrarOtro()">
            <option value="riesgo1">Riesgo Electrico</option>
            <option value="riesgo2">Riesgo Biologico</option>
            <option value="riesgo3">Riesgo Fisicos</option>
            <option value="otro">Otro</option>
        </select>
        <div id="otroRiesgo" style="display: none;">
            <label for="otroRiesgoInput">Escriba otro riesgo:</label>
            <input type="text" id="otroRiesgoInput" name="otroRiesgoInput">
        </div></p>

    

<!--
<p>Video de la condiciòn insegura<input type="text" REQUIRED placeholder="sub un videomostrando la con" name="video" size="30"></p>
-->
<p>¿Area donde observo el riesgo? <br><Textarea id = "myTextArea2"  REQUIRED placeholder="Ejm: En el bloque c" name="contexto" rows = "3"
    cols = "35"></textarea></p>

<p>Que tan peligroso cree que es?<br>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
  <label class="form-check-label" for="inlineRadio1">Bajo</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
  <label class="form-check-label" for="inlineRadio2">Medio</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" >
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
<script src="../../js/script.js">
</script>
</body>
</html> 