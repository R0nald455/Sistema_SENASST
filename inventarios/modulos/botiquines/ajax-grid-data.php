<?php

include "../../../db/conexion.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;


$columns = array(
	// datatable column index  => database column name
	0 => 'ID',
	1 => 'ImagenReferencia',
	2 => 'Nombre',
	3 => 'Ubicacion',
	4 => 'UbicacionEspecifica',
	5 => 'FechaUltima',
	6 => 'FechaRevision',
	7 => 'Responsable',
	8 => 'Comentarios',
);

// getting total number records without any search
$sql = "SELECT *";
$sql .= " FROM botiquines";
$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData; // when there is no search parameter then total number rows = total number filtered rows.


if (!empty($requestData['search']['value'])) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql .= " FROM botiquines";
	$sql .= " WHERE ID LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR ImagenReferencia LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Nombre LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Ubicacion LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR UbicacionEspecifica LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR FechaUltima LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR FechaRevision LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Responsable LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Comentarios LIKE '" . $requestData['search']['value'] . "%' ";
	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit

} else {

	$sql = "SELECT *";
	$sql .= " FROM botiquines";
	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");

}

$data = array();

while ($row = mysqli_fetch_array($query)) { // preparing an array
	$nestedData = array();

	$nestedData[] = $row["ID"];
    $nestedData[] = '<img src="data:imag/png;base64,' . base64_encode($row['ImagenReferencia']) . '" alt="Imagen" style="width: 150px; height:150px;" >';
	$nestedData[] = $row["Nombre"];
	$nestedData[] = $row["Ubicacion"];
	$nestedData[] = $row["UbicacionEspecifica"];
	$nestedData[] = $row["FechaUltima"];
	$nestedData[] = $row["FechaRevision"];
	$nestedData[] = $row["Responsable"];
	$nestedData[] = $row["Comentarios"];
	$nestedData[] = '<td><center>
	<a href="editar.php?ID=' . $row['ID'] . '" id="linkEditar" title="Editar datos" class="btn btn-sm btn-info editar-link"> <i class="fa-solid fa-pen-to-square" style="color: #f2eded;"></i> </a>
	<a href="index.php?action=delete&ID=' . $row['ID'] . '" onclick="return confirmacion()" data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash-can" style="color: #f2eded;"></i> </a>
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