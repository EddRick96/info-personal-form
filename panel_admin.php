<?php
// 1. CONTROL DE ACCESO Y SESIÓN
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Si el usuario no ha iniciado sesión o no es el admin, lo expulsamos al index
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] !== 'admin') {
    header("Location: index.php");
    exit();
}

// 2. CONEXIÓN A LA BASE DE DATOS
require_once "config/database.php";

$mensaje_alerta = "";

// 3. LÓGICA PARA ELIMINAR UN MENSAJE
if (isset($_GET['eliminar'])) {
    $id_eliminar = intval($_GET['eliminar']); // Sanitizamos el ID para que sea un entero seguro

    // Preparamos la consulta de eliminación
    $stmt = $conn->prepare("DELETE FROM messages WHERE id = ?");
    $stmt->bind_param("i", $id_eliminar);

    if ($stmt->execute()) {
        $mensaje_alerta = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            Mensaje eliminado correctamente.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
    } else {
        $mensaje_alerta = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            Error al intentar eliminar el mensaje.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                           </div>";
    }
    $stmt->close();
}

// 4. CONSULTA PARA VER TODOS LOS MENSAJES
$sql = "SELECT id, name, mail, message, date_state FROM messages ORDER BY date_state DESC";
$resultado = $conn->query($sql);

// INCLUSIÓN DEL ENCABEZADO SOLICITADO
include 'navbar.php'; 
?>

<div class="container my-5">
    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h2>Panel de Administración</h2>
            <p class="text-muted">Bienvenido, <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong>. Aquí puedes gestionar totalmente los mensajes recibidos.</p>
        </div>
        <div class="col-md-4 text-md-end">
            <span class="badge bg-danger p-2 fs-6">Rol: Administrador</span>
        </div>
    </div>

    <?php echo $mensaje_alerta; ?>

    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">Listado de Mensajes en el Sistema</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 5%;">ID</th>
                            <th scope="col" style="width: 15%;">Nombre</th>
                            <th scope="col" style="width: 20%;">Correo Electrónico</th>
                            <th scope="col" style="width: 35%;">Mensaje</th>
                            <th scope="col" style="width: 15%;">Fecha / Estado</th>
                            <th scope="col" style="width: 10%;" class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($resultado && $resultado->num_rows > 0): ?>
                            <?php while($row = $resultado->fetch_assoc()): ?>
                                <tr>
                                    <td><strong>#<?php echo $row['id']; ?></strong></td>
                                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                                    <td>
                                        <a href="mailto:<?php echo $row['mail']; ?>" class="text-decoration-none">
                                            <?php echo htmlspecialchars($row['mail']); ?>
                                        </a>
                                    </td>
                                    <td>
                                        <div class="text-wrap" style="max-height: 80px; overflow-y: auto;">
                                            <?php echo nl2br(htmlspecialchars($row['message'])); ?>
                                        </div>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            <?php echo date('d/m/Y H:i', strtotime($row['date_state'])); ?>
                                        </small>
                                    </td>
                                    <td class="text-center">
                                        <a href="panel_admin.php?eliminar=<?php echo $row['id']; ?>" 
                                           class="btn btn-outline-danger btn-sm"
                                           onclick="return confirm('¿Estás completamente seguro de que deseas eliminar este mensaje de forma permanente?');">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    <i class="bi bi-chat-left-x fs-3 d-block mb-2"></i>
                                    No se encontraron mensajes registrados en la base de datos.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php 
// 5. CERRAR CONEXIÓN
$conn->close();

// INCLUSIÓN DEL PIE DE PÁGINA SOLICITADO
include 'footer.php'; 
?>