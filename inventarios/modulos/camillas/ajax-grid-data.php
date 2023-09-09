<?php

include "../../../db/conexion.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;


$columns = array(
	// datatable column index  => database column name
	0 => 'CamillaID',
	1 => 'ImagenReferencia',
	2 => 'TipoCamilla',
	3 => 'Señalizacion',
	4 => 'Acceso',
	5 => 'EstadoSoporte',
	6 => 'CorreasSeguridad',
	7 => 'Inmovilizador',
	8 => 'Limpieza',
	9 => 'InstalacionPared',
	10 => 'UbicacionActual',
	11 => 'FechaAdquisicion',
    12 => 'FechaUltimoMantenimiento',
	13 => 'FechaProximoMantenimiento',
	14 => 'Observaciones',
	15 => 'FechaRegistro',
);

// getting total number records without any search
$sql = "SELECT *";
$sql .= " FROM camillas";
$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData; // when there is no search parameter then total number rows = total number filtered rows.


if (!empty($requestData['search']['value'])) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql .= " FROM camillas";
	$sql .= " WHERE CamillaID LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR ImagenReferencia LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR TipoCamilla LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Señalizacion LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Acceso LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR EstadoSoporte LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR CorreasSeguridad LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Inmovilizador LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Limpieza LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR InstalacionPared LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR UbicacionActual LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR FechaAdquisicion LIKE '" . $requestData['search']['value'] . "%' ";
    $sql .= " OR FechaUltimoMantenimiento LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR FechaProximoMantenimiento LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Observaciones LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR FechaRegistro LIKE '" . $requestData['search']['value'] . "%' ";

	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit

} else {

	$sql = "SELECT *";
	$sql .= " FROM camillas";
	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");

}

$data = array();

while ($row = mysqli_fetch_array($query)) { // preparing an array
	$nestedData = array();

	$nestedData[] = $row["CamillaID"];
    $nestedData[] = '<img src="data:imag/png;base64,' . base64_encode($row['ImagenReferencia']) . '" alt="Imagen" style="width: 150px; height:150px;" >';
	$nestedData[] = $row["TipoCamilla"];
	$nestedData[] = $row["Señalizacion"];
	$nestedData[] = $row["Acceso"];
	$nestedData[] = $row["EstadoSoporte"];
	$nestedData[] = $row["CorreasSeguridad"];
	$nestedData[] = $row["Inmovilizador"];
	$nestedData[] = $row["Limpieza"];
	$nestedData[] = $row["InstalacionPared"];
	$nestedData[] = $row["UbicacionActual"];
    $nestedData[] = $row["FechaAdquisicion"];
    $nestedData[] = $row["FechaUltimoMantenimiento"];
    $nestedData[] = $row["FechaProximoMantenimiento"];
    $nestedData[] = $row["Observaciones"];
	$nestedData[] = date("d/m/Y", strtotime($row["FechaRegistro"]));
	$nestedData[] = '<td><center>
						<a href="#" id="linkEditar" data-id="' . $row['CamillaID'] . '" title="Editar datos" class="btn btn-sm btn-info editar-link"  data-bs-toggle="modal" data-bs-target="#actualizarModal"> <i class="fa-solid fa-pen-to-square" style="color: #f2eded;"></i> </a>
                    	<a href="index.php?action=delete&CamillaID=' . $row['CamillaID'] . '"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash-can" style="color: #f2eded;"></i> </a>
                    </center></td>';

	$data[] = $nestedData;

}

$json_data = array(
	"draw" => intval($requestData['draw']),
	// for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
	"recordsTotal" => intval($totalData),
	// total number of records
	"recordsFiltered" => intval($totalFiltered),
	// total number of records after searching, if there is no searching then totalFiltered = totalData
	"data" => $data // total data array
);


echo json_encode($json_data); // send data as json format

?>