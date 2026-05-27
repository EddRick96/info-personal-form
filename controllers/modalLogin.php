<?php
// Modal login controller logic here
?>

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginModalLabel">Iniciar sesión</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="controllers/login.php" method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre de usuario:</label>
            <input type="text" class="form-control" id="recipient-name" name="username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="col-form-label">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" form="loginForm">Iniciar sesión</button>
      </div>
    </div>
  </div>