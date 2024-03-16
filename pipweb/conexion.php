<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'pip';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>