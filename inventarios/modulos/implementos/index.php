<?php include "../../../db/conexion.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
		<?php include("head.php");?>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="http://obedalvarado.pw/" target="_blank">Administrar implementos</a>
                </div>
            </div>
            <!-- /navbar-inner -->
        </div><br />

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
                        <h3 class="panel-title"><i class="icon-user"></i> DataTables procesando datos del lado del servidor</h3> 
                        </div>
						
                        <div class="panel-body">
							<div class="pull-right">
								<a href="registro.php" class="btn btn-sm btn-primary">Nuevo implemento</a>
							</div><br>
							<hr>
                                    <table id="lookup" class="table table-bordered table-hover">  
	                                    <thead bgcolor="#eeeeee" align="center">
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
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>

        <script>
        $(document).ready(function() {
				let dataTable = $('#lookup').DataTable( {
					
				 "language":	{
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
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
						"sNext":     "Siguiente",
						"sPrevious": "Anterior"
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
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>
    </body>
