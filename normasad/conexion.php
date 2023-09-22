<?php
$servidor= "localhost:3306";
$usuario= "root";
$password = "";
$nombreBD= "bases_de_datos";
$db = new mysqli($servidor, $usuario, $password, $nombreBD);
if ($db->connect_error) {
    die("la conexión ha fallado: " . $db->connect_error);
}
if (!$db->set_charset("utf8")) {
    printf("Error al cargar el conjunto de caracteres utf8: %s\n", $db->error);
    exit();
} else {
    printf("", $db->character_set_name());
}
?>
