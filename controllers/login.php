<?php
session_start();
// Login controller logic here
require_once 'config/database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Aquí deberías validar las credenciales del usuario
    // Por ejemplo, podrías hacer una consulta a la base de datos para verificar el usuario y la contraseña
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user->num_rows === 1) {
        $row = $user->fetch_assoc();
        
        // NOTA: Como en el script anterior guardamos las contraseñas en texto plano, la validación es directa.
        // (En producción se recomienda usar password_hash() y password_verify()).
        if ($password === $row['password']) {
            
            // Credenciales correctas: Guardamos los datos en la sesión
            $_SESSION['usuario'] = $row['name_user'];
            $_SESSION['rol'] = $row['role'];

            // Redirección según el rol del usuario
            if ($row['role'] === 'Administrador') {
                header("Location: panel_admin.php");
            } else {
                header("Location: panel_profe.php");
            }
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('El usuario no existe'); window.location.href='index.php';</script>";
    }
    
    $stmt = null; // Cerrar la consulta 
}
$pdo = null;

?>