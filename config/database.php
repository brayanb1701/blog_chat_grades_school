<?php
// Variables de conexion a la base de datos
$server   = "localhost";
$username = "root";
$password = "projects";
$database = "colegio";

// Conexion a la base de datos
$mysqli = new mysqli($server, $username, $password, $database);

// Conectar a la base de datos
if ($mysqli->connect_error) {
    die('Conexión falló : '.$mysqli->connect_error);
}
?>