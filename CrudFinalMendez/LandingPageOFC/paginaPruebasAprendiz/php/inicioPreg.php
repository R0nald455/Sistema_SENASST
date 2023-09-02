<?php
    include ("../paginaPruebasInstructor/conex/conexion.php");
    session_start();
?>

<?php
    if (isset($_POST['btn-prueba'])) {
        if(!strlen($_POST['numPrueba'])){
            ?>
                <script>
                    Swal.fire({
                        title: `<h2 style="color: white;">Debes digitar un valor válido</h2>`,
                        html: '<h2 style="color: white;"> Asegurate de que digitar correctamente el número de la prueba</h2>',
                        background: 'black',
                        icon: 'warning',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Intentar de nuevo',
                        BackDrop: true,
                        allowEscapeKey : false,
                        allowOutsideClick: false,
                        allowSideClick: false,
                        allowEnterKey: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "indexInicioPreg.php";
                        }
                    })
                </script>
            <?php
            exit;
        } else {

            $numPrueba = $_POST['numPrueba'];
            $sql = "SELECT PruNumero FROM pruebas WHERE PruNumero = '$numPrueba'";
            $query = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($query);


            if ($row >= 1) {

                $inputValue = $_POST['numPrueba'];
                
                $sqlPregu="SELECT COUNT(PreNumPregunta) as total FROM preguntas WHERE PreNumPrueba = '$inputValue'";
                $querys=mysqli_query($con, $sqlPregu);
                $filaResultado = mysqli_fetch_assoc($querys);

                $aleatorio = $filaResultado['total'];

                $_SESSION['envia_numPrueba'] = $inputValue;

                $_SESSION['envia_aleatorio'] = range(1, $aleatorio);
                shuffle($_SESSION['envia_aleatorio']);

                // Redireccionar a otra página
                header("Location: ./index.php");
                exit;
            } else {

                ?>
                    <script>
                        console.log("no existe");
                    </script>
                <?php

                ?>
                    <script>
                        Swal.fire({
                            title: `<h2 style="color: white;">¡No existe la prueba!</h2>`,
                            html: '<h2 style="color: white;">El número que proporcionaste no pertenece a ninguna prueba</h2>',
                            background: 'black',
                            icon: 'warning',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Intentar de nuevo',
                            BackDrop: true,
                            allowEscapeKey : false,
                            allowOutsideClick: false,
                            allowSideClick: false,
                            allowEnterKey: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "indexInicioPreg.php";
                            }
                        })
                    </script>
                <?php


            }
        }
    } else {
        ?>
            <script>
                console.log("No se precionó nada");
            </script>
        <?php
    }

?>