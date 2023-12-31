<?php
session_start();
error_reporting(0);
require_once("../../../../db/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
</head>

<body>

    <?php if (isset($_SESSION["id"]) && $_SESSION["rol"] == 1 || $_SESSION["rol"] == 4): ?>

        <!-- Menu de navegacion-->

        <div class="container__menu">
            <div class="menu">

                <input type="checkbox" id="check__menu">
                <label for="check__menu" class="lbl-menu">
                    <span id="spn1"></span>
                    <span id="spn2"></span>
                    <span id="spn3"></span>
                </label>

                <nav>
                    <ul>
                        <li><img src="../../../../img/LogoSenaBlanco.png" width="50px" alt="logoSena"></li>
                        <li><a href="../../indexCamillas.php" id="selected">Inicio</a></li>
                        <li><a href="../index.php">Administrar camillas</a></li>
                        <li><a href="../inspecciones/index.php">Inspeccionar Camillas</a>
                        <li><a href="#">Camillas con revisiones pendientes</a></li>
                    </ul>
                </nav>

                <div class="responsive-container">
                    <img id="logoResponsive" src="../../../../img/LogoSenaBlanco.png" width="50px" alt="logoSena">
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="content">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa-solid fa-truck-medical"></i> Camillas con revisiones
                                    pendientes</h3>
                            </div>

                            <div class="panel-body"><br>
                                <hr>

                                <div class="table-container table-responsive">
                                    <table id="lookup" class="table table-hover">
                                        <thead bgcolor="rgb(57,168,1)" align="center">
                                            <tr>

                                                <th>ID</th>
                                                <th>Imagen de referencia</th>
                                                <th>Tipo</th>
                                                <th>Señalizacion</th>
                                                <th>Acceso</th>
                                                <th>Estado del soporte</th>
                                                <th>Correas de seguridad</th>
                                                <th>Inmovilizador</th>
                                                <th>Limpieza</th>
                                                <th>Instalacion de pared</th>
                                                <th>Ubicacion</th>
                                                <th>Fecha de adquisicion</th>
                                                <th>Ultimo mantenimiento</th>
                                                <th>Proximo mantenimiento</th>
                                                <th>Observaciones</th>
                                                <th>Fecha de registro</th>
                                                <th class="text-center"> Acciones </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span12-->
            </div>
        </div>
        <!--/.container-->


        <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../datatables/jquery.dataTables.js"></script>
        <script src="../../../datatables/dataTables.bootstrap.js"></script>

        <?php
        session_start();
        if (isset($_SESSION['actualizar_camilla']) && $_SESSION['actualizar_camilla']) {
            echo '<script>
                                Swal.fire({
									imageUrl: "https://i.imgur.com/d2hd0Gv.jpg",
									imageHeight: 200,
									imageAlt: "Camilla confirmacion",
                                    title: "Camilla actualizada exitosamente!",
                                    text: "Los datos de la camilla han sido actualizados.",
									confirmButtonColor: "#ffc107"
                                });
                            </script>';
            $_SESSION['actualizar_camilla'] = false; // Reinicia la variable de sesión
        }
        ?>

        <script src="../js/confirmacion.js"></script>
        <?php include('eliminar.php'); ?>

        <?php
        session_start();
        if (isset($_SESSION['eliminar_camilla']) && $_SESSION['eliminar_camilla']) {
            echo '<script>
                                Swal.fire({
                                    imageUrl: "https://i.imgur.com/A9qxNme.jpg",
									imageHeight: 200,
									imageAlt: "eliminar confirmacion",  
                                    title: "¡Camilla eliminada exitosamente!",
                                    text: "La camilla ha sido eliminado del sistema.",
									confirmButtonColor: "#ffc107"
                                });
                            </script>';
            $_SESSION['eliminar_camilla'] = false; // Reinicia la variable de sesión
        }
        ?>

        <script>
            $(document).ready(function () {
                let dataTable = $('#lookup').DataTable({

                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados.",
                        "sEmptyTable": "Ningún dato disponible en esta tabla.",
                        "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sSearch": "Buscar:",
                        "sUrl": "",
                        "sInfoThousands": ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast": "Último",
                            "sNext": "Siguiente -->",
                            "sPrevious": "<-- Anterior"
                        },
                        "oAria": {
                            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                        }
                    },

                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        url: "ajax-grid-data.php", // json datasource
                        type: "post",  // method  , by default get
                        error: function () {  // error handling
                            $(".lookup-error").html("");
                            $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No se encontraron datos en el servidor</th></tr></tbody>');
                            $("#lookup_processing").css("display", "none");

                        }
                    }
                });
            });
        </script>

        <?php include('../../../../Footer/footer.php'); ?>

    <?php else: ?>

        <script>
            alert("No has iniciado sesión, por favor inicia a continuación.");
            window.location.href = "../../../../php/login.php";
        </script>

    <?php endif; ?>

</body>