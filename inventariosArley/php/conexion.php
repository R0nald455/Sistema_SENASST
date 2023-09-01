<?php 
    
$servername = "localhost:3306";
$database = "sstcba";
$username = "root";
$password = "";

// Create connection
$bd = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$bd) {
	die("Connection failed: " . mysqli_connect_error());
}
echo "";
?>