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
        font-family: Arial, Helvetica, sans-serif;
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
        border: 2px solid #ccc;
        border-radius: 10px;
        background-color: #fff;
    }

    input[type="text"], textarea {
        padding: 0.5em;
        width: 100%;
        border: 1px solid #ccc;
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
    <h1> Cree una pregunta del quiz sst</h1>
<form action="procesar.php"  method="post" enctype="multipart/form-data">



<p>Pregunta<br><input type="text" type="text" REQUIRED placeholder="ingrese la pregunta" name="pregunta"></p>

<p>Respuesta <br><Textarea id = "myTextArea" type="text" REQUIRED placeholder="ingrese la respuesta verdadera" name="respuesta" rows = "3"
    cols = "35"></textarea></p>

    

<!--
<p>Video de la condiciòn insegura<input type="text" REQUIRED placeholder="sub un videomostrando la con" name="video" size="30"></p>
-->
<p> Primer respuesta falsa <br><Textarea id = "myTextArea2"  REQUIRED placeholder="ingrese la respuesta falsa" name="falso1" rows = "3"
    cols = "35"></textarea></p>

<p>Segunda respuesta falsa <br><Textarea id = "myTextArea2"  REQUIRED placeholder="ingrese la respuesta falsa" name="falso2" rows = "3"
cols = "35"></textarea></p>

<p>Tercer respuesta falsa <br><Textarea id = "myTextArea2"  REQUIRED placeholder="ingrese la respuesta falsa" name="falso3" rows = "3"
cols = "35"></textarea></p>
    
<input type="submit" value="Subir">

</form> 
<br>
    <a href="../index.php">Volver</a>
</center>



</body>
</html>