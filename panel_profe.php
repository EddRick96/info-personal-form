<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// PROTECCIÓN DE LA PÁGINA: 
// Ajusta el rol según cómo lo tengas en tu base de datos (por ejemplo, 'Docente', 'Profesor' o 'Administrador')
if (!isset($_SESSION['usuario']) || ($_SESSION['rol'] !== 'Profesor' && $_SESSION['rol'] !== 'Administrador')) {
    header("Location: index.php");
    exit();
}

// Importar la conexión a la base de datos
require_once 'config/database.php';

// Consultar los datos directamente desde la vista de la BD
$query = "SELECT * FROM vista_mensajes_profe";
$result = $conn->query($query);
?>

<?php include 'navbar.php'; ?>

<main class="flex-grow-1 container mt-5 mb-5">
    <div class="row mb-4">
        <div class="col">
            <h2>Panel del Docente: <span class="text-warning"><?php echo htmlspecialchars($_SESSION['usuario']); ?></span></h2>
            <p class="text-secondary">Visualización exclusiva de la tabla de mensajes recibidos.</p>
        </div>
    </div>

    <div class="card bg-secondary text-white shadow-sm border-0" style="background-color: #1a365d !important;">
        <div class="card-body p-4">
            <h4 class="card-title mb-4"><i class="bi bi-envelope-paper-fill text-warning me-2"></i> Mensajes Recibidos</h4>

            <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                <table class="table table-hover table-dark align-middle m-0">
                    <thead class="sticky-top" style="z-index: 1020; background-color: #212529;">
                        <tr>
                            <th scope="col" style="width: 20%;">Nombre</th>
                            <th scope="col" style="width: 25%;">Correo Electrónico</th>
                            <th scope="col" style="width: 40%;">Mensaje</th>
                            <th scope="col" style="width: 30%;">Fecha de envío</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($result && $result->num_rows > 0): ?>
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td class="fw-bold text-warning">
                                        <?php echo htmlspecialchars($row['name']); ?>
                                    </td>
                                    <td>
                                        <a href="mailto:<?php echo $row['mail']; ?>" class="text-info text-decoration-none">
                                            <?php echo htmlspecialchars($row['mail']); ?>
                                        </a>
                                    </td>
                                    <td class="text-light">
                                        <?php echo nl2br(htmlspecialchars($row['message'])); ?>
                                    </td>
                                    <td class="text-secondary small">
                                        <?php echo htmlspecialchars($row['date_state']); ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">
                                    <i class="bi bi-chat-left-x d-block fs-2 mb-2"></i>
                                    No se encontraron mensajes en la base de datos.
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>

<?php
// Cerramos la conexión al terminar de renderizar la página
$conn->close();
?>