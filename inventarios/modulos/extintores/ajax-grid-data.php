<?php

include "../../../db/conexion.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;


$columns = array(
	// datatable column index  => database column name
	0 => 'ExtintorID',
	1 => 'NumeroDeSerie',
	2 => 'TipoDeExtintor',
	3 => 'FechaDeFabricacion',
	4 => 'FechaDeCompra',
	5 => 'Ubicacion',
	6 => 'UbicacionEspecifica',
	7 => 'UltimaRecarga',
	8 => 'ProximaRecarga',
	9 => 'Comentarios',
	10 => 'ImagenReferencia',
	11 => 'FechaDeRegistro',
);

// getting total number records without any search
$sql = "SELECT ExtintorID, NumeroDeSerie, TipoDeExtintor, FechaDeFabricacion, FechaDeCompra, Ubicacion, UbicacionEspecifica, UltimaRecarga, ProximaRecarga, Comentarios, ImagenReferencia, FechaDeRegistro";
$sql .= " FROM extintores";
$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData; // when there is no search parameter then total number rows = total number filtered rows.


if (!empty($requestData['search']['value'])) {
	// if there is a search parameter
	$sql = "SELECT ExtintorID, NumeroDeSerie, TipoDeExtintor, FechaDeFabricacion, FechaDeCompra, Ubicacion, UbicacionEspecifica, UltimaRecarga, ProximaRecarga, Comentarios, ImagenReferencia, FechaDeRegistro";
	$sql .= " FROM extintores";
	$sql .= " WHERE ExtintorID LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR NumeroDeSerie LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR TipoDeExtintor LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR FechaDeFabricacion LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR FechaDeCompra LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Ubicacion LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR UbicacionEspecifica LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR UltimaRecarga LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR ProximaRecarga LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR Comentarios LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR ImagenReferencia LIKE '" . $requestData['search']['value'] . "%' ";
	$sql .= " OR FechaDeRegistro LIKE '" . $requestData['search']['value'] . "%' ";
	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit

} else {

	$sql = "SELECT ExtintorID, NumeroDeSerie, TipoDeExtintor, FechaDeFabricacion, FechaDeCompra, Ubicacion, UbicacionEspecifica, UltimaRecarga, ProximaRecarga, Comentarios, ImagenReferencia, FechaDeRegistro";
	$sql .= " FROM extintores";
	$sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . " LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
	$query = mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");

}

$data = array();

while ($row = mysqli_fetch_array($query)) { // preparing an array
	$nestedData = array();

	$nestedData[] = $row["ExtintorID"];
	$nestedData[] = $row["NumeroDeSerie"];
	$nestedData[] = $row["TipoDeExtintor"];
	$nestedData[] = $row["FechaDeFabricacion"];
	$nestedData[] = $row["FechaDeCompra"];
	$nestedData[] = $row["Ubicacion"];
	$nestedData[] = $row["UbicacionEspecifica"];
	$nestedData[] = $row["UltimaRecarga"];
	$nestedData[] = $row["ProximaRecarga"];
	$nestedData[] = $row["Comentarios"];
	$nestedData[] = '<img src="data:imag/png;base64,' . base64_encode($row['ImagenReferencia']) . '" alt="Imagen" style="width: 150px; height:150px;" >';
	$nestedData[] = date("d/m/Y", strtotime($row["FechaDeRegistro"]));
	$nestedData[] = '<td><center>
						<a href="#" id="linkEditar" data-id="' . $row['ExtintorID'] . '" title="Editar datos" class="btn btn-sm btn-info editar-link"  data-bs-toggle="modal" data-bs-target="#actualizarModal"> <i class="fa-solid fa-pen-to-square" style="color: #f2eded;"></i> </a>
                    	<a href="index.php?action=delete&ExtintorID=' . $row['ExtintorID'] . '"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash-can" style="color: #f2eded;"></i> </a>
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