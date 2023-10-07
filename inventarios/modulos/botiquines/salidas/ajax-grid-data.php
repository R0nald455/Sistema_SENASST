<?php

include "../../../../db/conexion.php";

/* Database connection end */


// storing  request (ie, get/post) global array to a variable  
$requestData = $_REQUEST;


$columns = array( 
// datatable column index  => database column name
	0 => 'id_salidas',
    1 => 'id_elementos',
    2 => 'cantidad',
    3 => 'comentario',
	4 => 'fechaSale',
);

// getting total number records without any search
$sql = "SELECT *";
$sql.=" FROM salidasbotiquin";
$query=mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT *";
	$sql.=" FROM salidasbotiquin";
	$sql.=" WHERE id_salidas LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR id_elementos LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR cantidad LIKE '".$requestData['search']['value']."%' ";  
	$sql.=" OR comentario LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR fechaSale LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");
	$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   "; // $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.
	$query=mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO"); // again run query with limit
	
} else {	

	$sql = "SELECT *";
	$sql.=" FROM salidasbotiquin";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($conexion, $sql) or die("ajax-grid-data.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	
    $nestedData=array();

	$nestedData[] = $row["id_salidas"];
    $nestedData[] = $row["id_elementos"];
    $nestedData[] = $row["cantidad"];
    $nestedData[] = $row["comentario"];
    $nestedData[] = date("d/m/Y", strtotime($row["fechaSale"]));
    $nestedData[] = '<td><center>
                    <a href="editar.php?id_salidas='.$row['id_salidas'].'"  data-toggle="tooltip" title="Editar datos" class="btn btn-sm btn-info"> <i class="fa-solid fa-pen-to-square" style="color: #f2eded;"></i> </a>
                    <a href="index.php?action=delete&id_salidas='.$row['id_salidas'].'" onclick="return confirmacion()"  data-toggle="tooltip" title="Eliminar" class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash-can" style="color: #f2eded;"></i> </a>
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
