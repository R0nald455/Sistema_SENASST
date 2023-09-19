<?php

include "../../../../db/conexion.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;


$columns = array(
	// datatable column index  => database column name
	0 => 'ID_Entradas',
	1 => 'ID_Implementos',
	2 => 'ID_Empleado',
	3 => 'Cantidad',
	4 => 'Descripcion',
	5 => 'Fecha'
);

// getting total number records without any search
$sql = "SELECT *";
$sql .= " FROM tblentradas";
$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData; // when there is no search parameter then total number rows = total number filtered rows.


if (!empty($requestData['search']['value'])) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql .= " FROM tblentradas";
	$sql .= " WHERE ID_Entradas LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR ID_Implementos LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR ID_Empleado LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Cantidad LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Descripcion LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Fecha LIKE '" . $requestData['search']['value'] . "%' ";
	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit

} else {

	$sql = "SELECT *";
	$sql .= " FROM tblentradas";
	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");

}

$data = array();

while ($row = mysqli_fetch_array($query)) { // preparing an array
	$nestedData = array();

	$nestedData[] = $row["ID_Entradas"];
	$nestedData[] = $row["ID_Implementos"];
	$nestedData[] = $row["ID_Empleado"];
	$nestedData[] = $row["Cantidad"];
	$nestedData[] = $row["Descripcion"];
	$nestedData[] = date("d/m/Y", strtotime($row["Fecha"]));
	$nestedData[] = '<td><center>
                    <a href="editar.php?ID_Entradas=' . $row['ID_Entradas'] . '"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="fa-solid fa-pen-to-square" style="color: #f2eded;"></i> </a>
                    <a href="index.php?action=delete&ID_Entradas=' . $row['ID_Entradas'] . '"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash-can" style="color: #f2eded;"></i> </a>
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