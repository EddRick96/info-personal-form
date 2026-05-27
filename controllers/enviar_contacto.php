<?php
require_once 'config/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $mail = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // Insertar el mensaje en la base de datos
    $stmt = $pdo->prepare("INSERT INTO messages (name, mail, message) VALUES (?, ?, ?)");
    $stmt->bindParam("sss", $name, $mail, $message);
    if ($stmt->execute()) {
        // Redirecciona con éxito
        header("Location: contacto.php?status=success");
        exit();
    } else {
        // Redirecciona con error
        header("Location: contacto.php?status=error");
        exit();
    }
}
?>