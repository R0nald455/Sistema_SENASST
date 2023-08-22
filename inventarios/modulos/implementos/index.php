<?php
session_start();
error_reporting(0);
require_once ("../../../db/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
		<?php include("head.php");?>
    </head>

    <body>

    <?php if(isset($_SESSION["id"]) ): ?>

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
                <li><img src="../../../img/LogoSenaBlanco.png"  width="50px" alt="logoSena"></li>
                <li><a href="../../index.php" id="selected">Inicio</a></li>
                <li><a href="../entradas/index.php">Administrar entradas</a></li>
                <li><a href="../salidas">Administrar salidas</a></li>
                <li><a href="#newsletter">Administrar movimientos</a></li>
            </ul>
        </nav>

        <div class="responsive-container">
            <img id="logoResponsive" src="../../../img/LogoSenaBlanco.png"  width="50px" alt="logoSena">
        </div>
    </div>
</div>
    <br>
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
            <?php
                if(isset($_GET['action']) == 'delete'){
                    $id_delete = intval($_GET['ID_Implementos']);
                    $query = mysqli_query($conexion, "SELECT * FROM tblimplementos WHERE ID_Implementos='$id_delete'");
                    if(mysqli_num_rows($query) == 0){
                        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
                    }else{
                        $delete = mysqli_query($conexion, "DELETE FROM tblimplementos WHERE ID_Implementos='$id_delete'");
                        if($delete){
                            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, los datos han sido eliminados correctamente.</div>';
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
                        }
                    }
                }
			?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa-solid fa-screwdriver-wrench" style="color: #1b1c1d;"></i> Administrador de implementos</h3> 
                                </div>
						
                                <div class="panel-body">
                                    <div class="pull-right">
                                        <a href="registro.php" class="btn btn-sm btn-success">Nuevo implemento</a>
                                    </div><br>
                                    <hr>

                                    <div class="table-container table-responsive">
                                        <table id="lookup" class="table table-hover">  
                                            <thead bgcolor="rgb(57,168,1)" align="center">
                                            <tr>
        
                                            <th>ID de los implementos</th>
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

        <script>
        $(document).ready(function() {
				let dataTable = $('#lookup').DataTable( {
					
				"language":	{
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados.",
					"sEmptyTable":     "Ningún dato disponible en esta tabla.",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
						"sFirst":    "Primero",
						"sLast":     "Último",
						"sNext":     "Siguiente -->",
						"sPrevious": "<-- Anterior"
					},
					"oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
				},

					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-grid-data.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No se encontraron datos en el servidor</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>

    <?php else:?>

        <h1>No has iniciado sesion.</h1>

    <?php endif; ?>

</body>
