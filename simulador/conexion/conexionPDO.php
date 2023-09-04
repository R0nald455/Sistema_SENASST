<?php
$server="localhost:3306";
$pwd="";
$usuario="root";
$basedatos="sena";

try{
    $conn = new PDO("mysql:host=$server; dbname=$basedatos;", $usuario, $pwd);

} catch (PDOexception $e) {
    die('Connected failed: '. $e->getMessage());
}

