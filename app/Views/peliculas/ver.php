<?= $this->extend('Layout/main') ?>

<?php
// Preparar la imagen de fondo para el efecto blur
$imagenFondo = '';
if (!empty($pelicula['imagen'])) {
    $imagenFondo = base_url('uploads/' . $pelicula['imagen']);
}
?>

<?= $this->section('content') ?>

<!-- Estilo para el efecto de fondo borroso -->
<style>
.movie-detail {
    position: relative;
}

.movie-detail::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: url("<?= $imagenFondo ?>");
    background-size: cover;
    background-position: center;
    filter: blur(15px);
    opacity: 0.3;
    z-index: -1;
}
</style>

<div class="movie-detail">

    <div class="container py-5">

        <div class="row align-items-center">

            <div class="col-md-4">
                <?php if($pelicula['imagen']): ?>
                    <img src="<?= base_url('uploads/'.$pelicula['imagen']) ?>" 
                         class="img-fluid rounded shadow-lg"
                         alt="<?= esc($pelicula['titulo']) ?>">
                <?php endif; ?>
            </div>

            <div class="col-md-8 text-white">
                <h1 class="fw-bold"><?= esc($pelicula['titulo']) ?></h1>

                <p class="text-warning fw-semibold">
                    <?= esc($pelicula['genero']) ?> •
                    <?= esc($pelicula['anio']) ?> •
                    <?= esc($pelicula['duracion']) ?> min
                </p>

                <hr class="bg-light">

                <h5>Sinopsis</h5>
                <p class="lead"><?= esc($pelicula['descripcion']) ?></p>

                <div class="mt-4">
                    <a href="<?= base_url('peliculas') ?>" 
                       class="btn btn-light me-2">
                       ← Volver
                    </a>

                    <a href="<?= base_url('peliculas/edit/'.$pelicula['id_pelicula']) ?>" 
                       class="btn btn-warning">
                       Editar
                    </a>

                    <button class="btn btn-danger ms-2">
                       ▶ Reproducir
                    </button>
                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>