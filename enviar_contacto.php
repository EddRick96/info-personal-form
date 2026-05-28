<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 1. Capturar y limpiar datos
    $name = htmlspecialchars(trim($_POST['name'] ?? ''));
    $mail = filter_var(trim($_POST['mail'] ?? ''), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    // 2. Validar que no estén vacíos y que el email sea correcto
    if (empty($name) || empty($message) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header("Location: contacto.php?status=invalid_data");
        exit();
    }

    // 3. Insertar en la base de datos
    $stmt = $conn->prepare("INSERT INTO messages (name, mail, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $mail, $message);
    
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close(); // Cerramos antes de salir
        header("Location: contacto.php?status=success");
        exit();
    } else {
        $stmt->close();
        $conn->close(); // Cerramos antes de salir
        header("Location: contacto.php?status=error");
        exit();
    }
}

// Si no es POST, cerramos la conexión que abrió database.php
$conn->close(); 
?>