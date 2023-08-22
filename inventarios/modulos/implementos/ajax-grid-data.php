<?php

include "../../../db/conexion.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'ID_Implementos',
    1 => 'nombre', 
	2 => 'descripcion',
	3 => 'categoria',
    4 => 'cantidad',
    5 => 'ubicacion',
    6 => 'fecha'
);

// getting total number records without any search
$sql = "SELECT ID_Implementos, nombre, descripcion, categoria, cantidad, ubicacion, fecha";
$sql.=" FROM tblimplementos";
$query=mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT ID_Implementos, nombre, descripcion, categoria, cantidad, ubicacion, fecha";
	$sql.=" FROM tblimplementos";
	$sql.=" WHERE ID_Implementos LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR nombre LIKE '".$requestData['search']['value']."%' ";    
	$sql.=" OR descripcion LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR categoria LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR cantidad LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR ubicacion LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR fecha LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT ID_Implementos, nombre, descripcion, categoria, cantidad, ubicacion, fecha";
	$sql.=" FROM tblimplementos";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["ID_Implementos"];
    $nestedData[] = $row["nombre"];
	$nestedData[] = $row["descripcion"];
	$nestedData[] = $row["categoria"];
    $nestedData[] = $row["cantidad"];
    $nestedData[] = $row["ubicacion"];
    $nestedData[] = date("d/m/Y", strtotime($row["fecha"]));
    $nestedData[] = '<td><center>
                    <a href="editar.php?ID_Implementos='.$row['ID_Implementos'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="fa-solid fa-pen-to-square" style="color: #f2eded;"></i> </a>
                    <a href="index.php?action=delete&ID_Implementos='.$row['ID_Implementos'].'"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash-can" style="color: #f2eded;"></i> </a>
                    </center></td>';		
	
	$data[] = $nestedData;
    
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
