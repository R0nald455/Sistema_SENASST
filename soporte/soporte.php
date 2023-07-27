<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/27e58a102f.js" crosssorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/styles_soporte.css">
</head>
<body>

    <section id="soporte">
        <main id="container-soporte">
            <h2 class="titulo-soporte">Ayuda y Soporte</h2>
            <form class="form-soporte" id="contact-form" action="../soporte/php/script_soporte.php" method="POST">

                <div class="items form-group"><label class="label-soporte" for="nombre">Nombre:<input class="input-soporte form-control" type="text" id="nombre" name="nombre" required autocapitalize="words"></label></div>
                <div class="items form-group"><label class="label-soporte" for="apellido">Apellido:<input class="input-soporte form-control" type="text" id="apellido" name="apellido" required autocapitalize="words"></label></div>

                <div class="items input-group mb-3"><label class="label-soporte" for="email">Correo electrónico:<input class="input-soporte form-control" type="email" id="email" name="email" required></label></div>

                <div class="items"><label class="label-soporte" for="asunto">Asunto:
                    <select name="asunto" id="asunto" class="form-control">
                        <option value="Comentario">Comentario</option>
                        <option value="Sugerencia">Sugerencia</option>
                        <option value="Reclamo">Reclamo</option>
                    </select>
                </label></div>

                <div class="items form-group"><label class="label-soporte" for="mensaje">Mensaje:</label><textarea class="textarea-soporte form-control" id="mensaje" name="mensaje" style="resize: none;" required></textarea></div>

                <button class="submit-soporte btn btn-primary" type="submit" value="Enviar">Enviar</button>
            </form>
        </main>
    </section>

</body>
</html>