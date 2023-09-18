<?php
session_start();
error_reporting(0);

require_once("../../../db/conexion.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("head.php");
    include('registro.php');
    ?>
</head>

<body>

    <?php if (isset($_SESSION["id"])): ?>

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
                        <li><img src="../../../img/LogoSenaBlanco.png" width="50px" alt="logoSena"></li>
                        <li><a href="../indexExtintores.php" id="selected">Inicio</a></li>
                        <li><a href="#">Administrar extintores</a></li>
                        <li><a href="inspecciones/index.php">Inspección de extintores</a></li>
                        <li><a href="recarga/index.php">Extintores con revisiones pendientes</a></li>
                    </ul>
                </nav>

                <div class="responsive-container">
                    <img id="logoResponsive" src="../../../img/LogoSenaBlanco.png" width="50px" alt="logoSena">
                </div>
            </div>
        </div>
        <br>

        <?php include('eliminar.php'); ?>

        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="content">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa-solid fa-fire-extinguisher"
                                        style="color: #39a801;"></i> Administrador de extintores</h3>
                            </div>

                            <div class="panel-body">

                                <div class="pull-right">
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#registroModal"><i class="fa-solid fa-plus"></i>Nuevo
                                        extintor</button>
                                    <a id="button-pdf" href="reportes.php" class="btn btn-sm btn-primary"><i
                                            class="fa-solid fa-file-pdf"></i> Generar PDF</a>
                                    <a id="button-alert" href="alertas/config.php" class="btn btn-sm btn-info"><i
                                            class="fa-solid fa-envelope"></i> Alerta para
                                        extintores con revisiones/recargas pendientes</a>
                                </div><br>
                                <h6><i>"Al alertar te llega un correo electronico con la informacion del extintor"</i></h6>
                                <hr>

                                <div class="table-container table-responsive">
                                    <table id="lookup" class="table table-hover">
                                        <thead bgcolor="rgb(57,168,1)" align="center">
                                            <tr>
                                                <th>ID</th>
                                                <th>Numero de serie</th>
                                                <th>Tipo de extintor</th>
                                                <th>Fecha de fabricación</th>
                                                <th>Fecha de compra</th>
                                                <th>Ubicación</th>
                                                <th>Ubicación especifica</th>
                                                <th>Ultima recarga</th>
                                                <th>Proxima recarga</th>
                                                <th>Comentarios</th>
                                                <th>Imagen de referencia</th>
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


        <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../datatables/jquery.dataTables.js"></script>
        <script src="../../datatables/dataTables.bootstrap.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php
        session_start();
        if (isset($_SESSION['email_sent']) && $_SESSION['email_sent']) {
            echo '<script>
                                Swal.fire({
                                    icon: "success",
                                    title: "¡Correo enviado!",
                                    text: "Se te ha enviado la informacion completa del extintor a revisar.",
                                });
                            </script>';
            $_SESSION['email_sent'] = false; // Reinicia la variable de sesión
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
                        type: "POST",  // method  , by default get
                        error: function () {  // error handling
                            $(".lookup-error").html("");
                            $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No se encontraron datos en el servidor</th></tr></tbody>');
                            $("#lookup_processing").css("display", "none");

                        }
                    }
                });
            });
        </script>

    <?php else: ?>

        <script>
            alert("No has iniciado sesión, por favor inicia a continuación.");
            window.location.href = "../../../php/login.php";
        </script>

    <?php endif; ?>

</body>

</html>