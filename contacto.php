<?php include 'navbar.php'; ?>
<form class="container mt-4 mb-5" action="enviar_contacto.php" method="POST">
    <h2>Contacto</h2>
    <div class="mb-3">
        <label for="name" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="mail" class="form-label">Correo Electrónico:</label>
        <input type="email" class="form-control" id="mail" name="mail" required>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Mensaje:</label>
        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="statusModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center fs-5">
                <div id="modalIcon" class="mb-3"></div>
                <p id="modalMessage"></p>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" id="modalBtn" class="btn px-4" data-bs-dismiss="modal">Entendido</button>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_GET['status'])): ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Capturamos el estado enviado por la URL
        const status = "<?php echo $_GET['status']; ?>";
        
        // Elementos del modal
        const modalElement = document.getElementById('statusModal');
        const modalTitle = document.getElementById('statusModalLabel');
        const modalIcon = document.getElementById('modalIcon');
        const modalMessage = document.getElementById('modalMessage');
        const modalBtn = document.getElementById('modalBtn');
        
        // Configuración dependiendo del resultado
        if (status === 'success') {
            modalTitle.innerText = '¡Éxito!';
            modalTitle.classList.add('text-success');
            modalIcon.innerHTML = '<i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>';
            modalMessage.innerText = 'Mensaje enviado correctamente.';
            modalBtn.classList.add('btn-success');
        } else if (status === 'error') {
            modalTitle.innerText = 'Hubo un problema';
            modalTitle.classList.add('text-danger');
            modalIcon.innerHTML = '<i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 3rem;"></i>';
            modalMessage.innerText = 'Error al enviar el mensaje. Por favor, inténtalo de nuevo.';
            modalBtn.classList.add('btn-danger');
        }
        
        // Inicializar y mostrar el modal de Bootstrap
        const myModal = new bootstrap.Modal(modalElement);
        myModal.show();
        
        // Limpiar la URL para que no se vuelva a abrir el modal si el usuario recarga la página
        window.history.replaceState({}, document.title, window.location.pathname);
    </script>
<?php endif; ?>
<?php include 'footer.php'; ?>