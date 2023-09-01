<?php
$server="localhost:3307";
$pwd="";
$usuario="root";
$basedatos="sstcba";

try{
    $conn = new PDO("mysql:host=$server; dbname=$basedatos;", $usuario, $pwd);

} catch (PDOexception $e) {
    die('Connected failed: '. $e->getMessage());
}

