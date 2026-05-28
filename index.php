<?php include 'navbar.php'; ?>
<div class="container py-5">

    <section id="home" class="mb-5">
        <h2 class="text-center mb-4 pb-2 border-bottom">Biografía</h2>

        <div id="bioCarousel" class="carousel carousel-dark slide shadow-sm rounded-3 overflow-hidden" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#bioCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#bioCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#bioCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active p-4 p-md-5">
                    <div class="row align-items-center h-100">
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <img src="assets/img/pic_Erick.jpeg" class="img-fluid rounded-circle border border-4 border-primary" alt="Erick Bolaños" style="width: 150px; height: 150px; object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <h3>¡Hola! Soy Erick Bolaños</h3>
                            <p class="lead">Tengo 30 años y soy técnico en soporte de TI en una institución educativa por ya 4 años. Me considero una persona proactiva, responsable y con habilidades para trabajar en equipo.</p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item p-4 p-md-5">
                    <div class="d-flex flex-column justify-content-center h-100 text-center px-md-5">
                        <div class="mb-3">
                            <i class="bi bi-patch-check-fill text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h3>Microsoft Administrator Associate</h3>
                        <p class="text-muted">Esta certificación ha sido un gran logro en mi carrera profesional. Me ha permitido adquirir conocimientos avanzados en la administración de sistemas operativos Windows Server, gestión de redes y servicios en la nube para proyectos complejos.</p>
                    </div>
                </div>

                <div class="carousel-item p-4 p-md-5">
                    <div class="d-flex flex-column justify-content-center h-100 text-center px-md-5">
                        <div class="mb-3">
                            <i class="bi bi-terminal-fill text-dark" style="font-size: 3rem;"></i>
                        </div>
                        <h3>Sistemas Operativos Linux</h3>
                        <p class="text-muted">Tengo experiencia en la administración de entornos Linux, lo que amplía mis conocimientos informáticos para enfrentar diferentes desafíos tecnológicos. Siempre busco oportunidades para aprender y crecer en mi carrera.</p>
                    </div>
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#bioCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#bioCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>

    <section id="about" class="mb-5">
        <h2 class="text-center mb-4 pb-2 border-bottom">Hobbies</h2>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-3 text-center">

            <div class="col">
                <div class="card h-100 hobby-card p-3">
                    <i class="bi bi-fan hobby-icon"></i>
                    <div class="card-body p-2">
                        <h6 class="card-title mb-0">Fútbol</h6>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 hobby-card p-3">
                    <i class="bi bi-dribbble hobby-icon"></i>
                    <div class="card-body p-2">
                        <h6 class="card-title mb-0">Basket</h6>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 hobby-card p-3">
                    <i class="bi bi-music-note-beamed hobby-icon"></i>
                    <div class="card-body p-2">
                        <h6 class="card-title mb-0">Bailar</h6>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 hobby-card p-3">
                    <i class="bi bi-tv hobby-icon"></i>
                    <div class="card-body p-2">
                        <h6 class="card-title mb-0">Ver Anime</h6>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 hobby-card p-3">
                    <i class="bi bi-speaker hobby-icon"></i>
                    <div class="card-body p-2">
                        <h6 class="card-title mb-0">Guitarra</h6>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100 hobby-card p-3">
                    <i class="bi bi-mic hobby-icon"></i>
                    <div class="card-body p-2">
                        <h6 class="card-title mb-0">Cantar</h6>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="contact" class="text-center py-4">
        <h3 class="mb-4">Redes sociales</h3>
        <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank" class="social-link link-google">
                <i class="bi bi-google"></i> Google
            </a>
            <a href="https://www.instagram.com/erick_bolanos_/" target="_blank" class="social-link link-instagram">
                <i class="bi bi-instagram"></i> Instagram
            </a>
            <a href="https://www.linkedin.com/in/erick-david-bolanos-guerrero-635a28175/" target="_blank" class="social-link link-linkedin">
                <i class="bi bi-linkedin"></i> LinkedIn
            </a>
            <a href="https://github.com/EddRick96" target="_blank" class="social-link link-github">
                <i class="bi bi-github"></i> GitHub
            </a>
        </div>
    </section>

</div>

<?php include 'footer.php'; ?>