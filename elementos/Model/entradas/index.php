<?php
session_start();
error_reporting(0);
include "../../conexion.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
		<?php include("head.php");?>
    </head>
    <body>

    <?php if(isset($_SESSION["id"]) ): ?>

    <br>
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
                <li><a href="../../../php/rolFuncionario/indexfuncionario.php" id="selected">Inicio</a></li>
                <li><a href="../botiquines/index.php">Administrar Elementos</a></li>
                <li><a href="../inspecciones/index.php">Inspeccion de Elementos</a></li>
                <li><a href="../entradas/index.php">Entrada de Elementos</a></li>
                <li><a href="../salidas/index.php">Salida de Elementos</a></li>


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
                    $id_delete = intval($_GET['ID_Entradas']);
                    $query = mysqli_query($conexion, "SELECT * FROM tblentradas WHERE ID_Entradas='$id_delete'");
                    if(mysqli_num_rows($query) == 0){
                        echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
                    }else{
                        $delete = mysqli_query($conexion, "DELETE FROM tblentradas WHERE ID_Entradas='$id_delete'");
                        if($delete){
                            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>  Bien hecho, la entrada ha sido eliminada correctamente.</div>';
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar la entrada.</div>';
                        }
                    }
                }
			?>
                    <div class="panel panel-default">   
                        <div class="panel-heading">
                        <h3 class="panel-title" style="color:#3fc13f;"><i class="fa-solid fa-up-long" style="color: #49bd1f;"></i></i>Entrada de elementos al botiquin</h3> 
                        </div>
						
                        <div class="panel-body">
							<div class="pull-right">
								<a href="registro.php" class="btn btn-sm btn-success">Nueva entrada de Elementos</a>
							</div><br>
							<hr>
                                <div class="table-container table-responsive">
                                        <table id="lookup" class="table table-hover">  
	                                    <thead bgcolor="rgb(57,168,1)" align="center">
                                        <tr>
	  
                                        <th>ID de la entrada</th>
	                                    <th>ID del elemento del botiquín</th>
                                        <th>Cantidad</th>
                                        <th>Comentario</th>
                                        <th>Fecha de entrada</th>
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
                    <!--/.span9-->
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

<script>
    alert("No has iniciado sesión, por favor inicia a continuación.");
    window.location.href = "../../../php/login.php";
</script>
    <?php endif; ?>
    
    </body>

