<?php
session_start();
error_reporting(0);

require_once("../../../db/conexion.php");

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
                        <li><img src="../../../img/LogoSenaBlanco.png" width="50px" alt="logoSena"></li>
                        <li><a href="../indexEpps.php" id="selected">Inicio</a></li>
                        <li><a href="#">Administrar elementos de proteccion personal</a></li>
                        <li><a href="entradas/index.php">Administrar entradas</a></li>
                        <li><a href="salidas/index.php">Administrar salidas</a></li>
                    </ul>
                </nav>

                <div class="responsive-container">
                    <img id="logoResponsive" src="../../../img/LogoSenaBlanco.png" width="50px" alt="logoSena">
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
                                <h3 class="panel-title"><i class="fa-solid fa-screwdriver-wrench"
                                        style="color: #1b1c1d;"></i> Administrador de Elementos de Proteccion Personal</h3>
                            </div>

                            <?php include("registro.php"); ?>

                            <div class="panel-body">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                        data-bs-target="#registroModal"><i class="fa-solid fa-plus"></i> Nuevo
                                        elemento de proteccion personal</button>
                                </div><br>
                                <hr>

                                <div class="table-container table-responsive">
                                    <table id="lookup" class="table table-hover">
                                        <thead bgcolor="rgb(57,168,1)" align="center">
                                            <tr>

                                                <th>ID</th>
                                                <th>Imagen de referencia</th>
                                                <th>Nombre </th>
                                                <th>Descripcion </th>
                                                <th>Categoria</th>
                                                <th>Cantidad </th>
                                                <th>Ubicacion</th>
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

        <?php
        session_start();
        if (isset($_SESSION['actualizar_epp']) && $_SESSION['actualizar_epp']) {
            echo '<script>
                                Swal.fire({
									imageUrl: "https://ik.imagekit.io/smdxc0e2g3/userscontent2-endpoint/images/0016f8ea-4c4b-47c4-aeec-3935fd1c0ee1/d577b255624650344404f3b22776fb52.gif?tr=w-240,rt-0",
									imageHeight: 200,
									imageAlt: "EPP confirmacion",
                                    title: "Elemento de proteccion personal actualizado exitosamente!",
                                    text: "Los datos del EPP han sido actualizados.",
									confirmButtonColor: "#ffc107"
                                });
                            </script>';
            $_SESSION['actualizar_epp'] = false; // Reinicia la variable de sesión
        }
        ?>

        <script src="js/confirmacion.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php include('eliminar.php'); ?>

        <?php
        session_start();
        if (isset($_SESSION['eliminar_epp']) && $_SESSION['eliminar_epp']) {
            echo '<script>
                                Swal.fire({
                                    imageUrl: "https://i.imgur.com/A9qxNme.jpg",
									imageHeight: 200,
									imageAlt: "eliminar confirmacion",  
                                    title: "¡Elemento de proteccion personal eliminado exitosamente!",
                                    text: "El EPP ha sido eliminado del sistema.",
									confirmButtonColor: "#ffc107"
                                });
                            </script>';
            $_SESSION['eliminar_epp'] = false; // Reinicia la variable de sesión
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

        <?php include('../../../Footer/footer.php'); ?>


    <?php else: ?>

        <script>
            alert("No has iniciado sesión, por favor inicia a continuación.");
            window.location.href = "../../../php/login.php";
        </script>

    <?php endif; ?>

</body>