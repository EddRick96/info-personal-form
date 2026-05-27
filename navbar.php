<?php
session_start();
// Si no hay sesión o el rol no es Administrador, lo expulsa
// if (!isset($_SESSION['usuario'])) {
//     header('Location: index.php');
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap and icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/index.css">
    <!-- custom js -->
    <!-- <script src="assets/js/snippets.js" defer></script> -->
    <title>BITBio Erick Bolaños</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="index.php">BITBio ErickB</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Bio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
                <!-- si la sesión no existe, mostrar el botón de login con modal, de lo contrario mostrar el botón de logout con sus iconos -->
                <?php if (!isset($_SESSION['usuario'])): ?>
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar sesión</button>
                <?php else: ?>
                    <a href="logout.php" class="btn btn-outline-danger">
                        <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                    </a>
                <?php endif; ?>
                
                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                    <?php include 'controllers/modalLogin.php'; ?>
                </div>

            </div>
        </div>
    </nav>
    <main class="container mt-4 mb-5">