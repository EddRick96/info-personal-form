<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
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
    <title>BITBio Erick Bolaños</title>
</head>

<body class="d-flex flex-column min-vh-100">
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
                    <?php if (isset($_SESSION['usuario']) && $_SESSION['rol'] === 'Administrador'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="panel_admin.php">Panel Admin</a>
                        </li>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['usuario']) && ($_SESSION['rol'] === 'Profesor' || $_SESSION['rol'] === 'Administrador')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="panel_profe.php">Panel Profe</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <!-- si la sesión no existe, mostrar el botón de login con modal, de lo contrario mostrar el botón de logout con sus iconos -->
                <?php if (!isset($_SESSION['usuario'])): ?>
                    <div class="dropdown">
                        <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                            <i class="bi bi-person-circle"></i>
                        </button>

                        <form class="dropdown-menu dropdown-menu-end p-4 shadow" style="min-width: 280px;" action="controllers/login.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Nombre de usuario" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-success">Iniciar sesión</button>
                            </div>
                        </form>
                    </div>
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