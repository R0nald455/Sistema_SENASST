<?php
session_start();
error_reporting(0);
require_once("../../../../db/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <?php include("head.php"); ?>
    </head>

<body>

    <?php if (isset($_SESSION["id"]) && $_SESSION["rol"] == 1 || $_SESSION["rol"] == 4): ?>

        <?php include("registro.php"); ?>

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
                        <li><a href="../../indexBotiquines.php" id="selected">Inicio</a></li>
                        <li><a href="../index.php">Administrar botiquines</a></li>
                        <li><a href="../elementos/index.php">Administrar elementos</a>
                        <li><a href="../inspeccionBotiquines/index.php">Inspeccion de botiquines</a>
                        <li><a href="../inspecciones/index.php">Inspeccion de elementos</a>
                        <li><a href="../entradas/index.php">Entrada de elementos</a>
                        <li><a href="#">Salida de elementos</a>
                        </li>

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
                        <?php include('eliminar.php'); ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title" style="color: #f63c3c"><i class="fa-solid fa-down-long"
                                        style="color: #c81414;"></i> Salida de elementos del botiquin</h3>
                            </div>

                            <div class="panel-body">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#registroModal"><i class="fa-solid fa-plus"></i> Nueva salida de
                                        Elementos</button>
                                </div><br>
                                <hr>
                                <div class="table-container table-responsive">
                                    <table id="lookup" class="table table-hover">
                                        <thead bgcolor="rgb(57,168,1)" align="center">
                                            <tr>

                                                <th>ID de la salida</th>
                                                <th>ID del elemento del botiquín</th>
                                                <th>Cantidad</th>
                                                <th>Comentario</th>
                                                <th>Fecha de salida</th>
                                                <th class="text-center"> Acciones </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>

        <?php
        session_start();
        if (isset($_SESSION['actualizar_salida']) && $_SESSION['actualizar_salida']) {
            echo '<script>
                                Swal.fire({
									imageUrl: "https://i.imgur.com/RmemS7c.png",
									imageHeight: 200,
									imageAlt: "salida confirmacion",
                                    title: "¡Salida actualizada exitosamente!",
                                    text: "Los datos de la salida han sido actualizados.",
									confirmButtonColor: "#ffc107"
                                });
                            </script>';
            $_SESSION['actualizar_salida'] = false; // Reinicia la variable de sesión
        }
        ?>

        <script src="../js/confirmacion.js"></script>
        <?php include('eliminar.php'); ?>

        <?php
        session_start();
        if (isset($_SESSION['eliminar_salida']) && $_SESSION['eliminar_salida']) {
            echo '<script>
                                Swal.fire({
                                    imageUrl: "https://i.imgur.com/A9qxNme.jpg",
									imageHeight: 200,
									imageAlt: "eliminar confirmacion", 
                                    title: "¡Salida eliminada exitosamente!",
                                    text: "El salida ha sido eliminada del sistema, recuerda actualizar las cantidades en administrar elementos en caso de ser necesario.",
									confirmButtonColor: "#ffc107"
                                });
                            </script>';
            $_SESSION['eliminar_salida'] = false; // Reinicia la variable de sesión
        }
        ?>

        <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../datatables/jquery.dataTables.js"></script>
        <script src="../../../datatables/dataTables.bootstrap.js"></script>

        <script src="../js/scriptElementos.js"></script>

        <script>
            $(document).ready(function () {
                let dataTable = $('#lookup').DataTable({

                    "language": {
                        "sProcessing": "Procesando...",
                        "sLengthMenu": "Mostrar _MENU_ registros",
                        "sZeroRecords": "No se encontraron resultados",
                        "sEmptyTable": "Ningún dato disponible en esta tabla",
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
                        type: "post", // method  , by default get
                        error: function () { // error handling
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