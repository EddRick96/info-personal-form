<?php
$host = 'localhost'; // sql200.infinityfree.com
$dbname = 'db_bitbio_mensajes'; // if0_42037614_db_bitbio_mensajes
$username = 'root'; //if0_42037614
$password = ''; // OAAOIUxre3au

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>