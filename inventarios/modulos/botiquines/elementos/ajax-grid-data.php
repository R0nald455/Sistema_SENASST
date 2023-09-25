<?php
include "../../../../db/conexion.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;


$columns = array(
	// datatable column index  => database column name
	0 => 'id_elementos',
	1 => 'id_botiquin',
	2 => 'ImagenReferencia',
	3 => 'nombre',
	4 => 'cantidad',
	5 => 'ubicacion',
	6 => 'ubicacionEspecifica',
	7 => 'estado',
	8 => 'fechaRegistro',
	9 => 'fechaVencimiento',
	10 => 'comentarios'
);

// getting total number records without any search
$sql = "SELECT *";
$sql .= " FROM elementosbotiquines";
$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

if (!empty($requestData['search']['value'])) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql .= " FROM elementosbotiquines";
	$sql .= " WHERE id_elementos LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR id_botiquin LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR ImagenReferencia LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR nombre LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR cantidad LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR ubicacion LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR ubicacionEspecifica LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR estado LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR fechaRegistro LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR fechaVencimiento LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR comentarios LIKE '" . $requestData['search']['value'] . "%' ";

	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit

} else {

	$sql = "SELECT *";
	$sql .= " FROM elementosbotiquines";
	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");
}

$data = array();

while ($row = mysqli_fetch_array($query)) {  // preparing an array
	$nestedData = array();

	$nestedData[] = $row["id_elementos"];
	$nestedData[] = $row["id_botiquin"];
	$nestedData[] = '<img src="data:imag/png;base64,' . base64_encode($row['ImagenReferencia']) . '" alt="Imagen" style="width: 150px; height:150px;" >';
	$nestedData[] = $row["nombre"];
	$nestedData[] = $row["cantidad"];
	$nestedData[] = $row["ubicacion"];
	$nestedData[] = $row["ubicacionEspecifica"];
	$nestedData[] = $row["estado"];
	$nestedData[] = $row["fechaRegistro"];
	$nestedData[] = $row["fechaVencimiento"];
	$nestedData[] = $row["comentarios"];
	$nestedData[] = '<td><center>
                    <a href="editar.php?id_elementos=' . $row['id_elementos'] . '"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="fa-solid fa-pen-to-square" style="color: #f2eded;"></i> </a>
                    <a href="index.php?action=delete&id_elementos=' . $row['id_elementos'] . '"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash-can" style="color: #f2eded;"></i> </a>
                    </center></td>';

	$data[] = $nestedData;
}

$json_data = array(
	"draw"            => intval($requestData['draw']),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
	"recordsTotal"    => intval($totalData),  // total number of records
	"recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
	"data"            => $data   // total data array
);

echo json_encode($json_data);  // send data as json format
