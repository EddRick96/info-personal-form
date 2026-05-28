<?php
require_once "../config/database.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name_user = $_POST['username'];
    $password = $_POST['password'];

    // CORRECCIÓN Y FILTRO: Buscamos el usuario, pero limitamos la consulta estrictamente a 'admin' o 'profe'
    $stmt = $conn->prepare("SELECT * FROM users WHERE (name_user = 'admin' OR name_user = 'profe') AND name_user = ?");
    $stmt->bind_param("s", $name_user);
    $stmt->execute();
    
    // CORRECCIÓN: Para usar num_rows en MySQLi con Prepared Statements, se debe almacenar el resultado primero
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        // CORRECCIÓN: Obtenemos los datos desde el resultado de la consulta
        $user = $resultado->fetch_assoc();
        
        // Validación de contraseña en texto plano
        if ($password === $user['password']) {
            
            // Guardamos los datos en la sesión
            $_SESSION['usuario'] = $user['name_user'];
            $_SESSION['rol'] = $user['role'];

            // Redirección según el rol exacto guardado en la base de datos
            if ($user['name_user'] === 'admin') {
                header("Location: ../panel_admin.php");
            } else {
                header("Location: ../panel_profe.php");
            }
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta'); window.location.href='../index.php';</script>";
        }
    } else {
        // Si entra aquí es porque el usuario no existe O no es ni 'admin' ni 'profe'
        echo "<script>alert('Acceso denegado u usuario no autorizado'); window.location.href='../index.php';</script>";
    }
    
    $stmt->close(); 
}
$conn->close(); 
?>