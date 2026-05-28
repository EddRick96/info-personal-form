<?php
$host = 'localhost';
$dbname = 'db_bitbio_mensajes';
$username = 'root';
$password = '';

// try {
//     // $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
//     // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
// } catch (PDOException $e) {
//     die("Error de conexión: " . $e->getMessage());
// }
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>