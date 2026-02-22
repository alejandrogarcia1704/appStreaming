<?= $this->extend('Layout/main') ?>
<?= $this->section('content') ?>

<div class="container">

    <h2 class="mb-4 fw-bold">Catálogo de Películas</h2>

    <a href="<?= base_url('peliculas/create') ?>" 
       class="btn btn-primary mb-4">
       Nueva Película
    </a>

    <div class="row">
        <?php foreach($peliculas as $pelicula): ?>
            <div class="col-md-3 mb-4">
                <div class="card bg-dark text-white shadow-lg h-100 movie-card">

                    <?php if($pelicula['imagen']): ?>
                        <img src="<?= base_url('uploads/'.$pelicula['imagen']) ?>" 
                             class="card-img-top"
                             style="height:300px; object-fit:cover;">
                    <?php else: ?>
                        <img src="<?= base_url('images/no-image.png') ?>" 
                             class="card-img-top"
                             style="height:300px; object-fit:cover;">
                    <?php endif; ?>

                    <div class="card-body">
                        <h5 class="card-title"><?= esc($pelicula['titulo']) ?></h5>
                        <p class="small text-muted">
                            <?= esc($pelicula['genero']) ?> | 
                            <?= esc($pelicula['anio']) ?>
                        </p>
                        <p><?= esc($pelicula['duracion']) ?> min</p>

                        <!-- Botón Ver Detalle -->
                        <a href="<?= base_url('peliculas/ver/'.$pelicula['id_pelicula']) ?>" 
                           class="btn btn-info btn-sm mb-2 w-100">
                           Ver Detalle
                        </a>

                        <div class="d-flex justify-content-between">
                            <a href="<?= base_url('peliculas/edit/'.$pelicula['id_pelicula']) ?>" 
                               class="btn btn-warning btn-sm">
                               Editar
                            </a>

                            <a href="<?= base_url('peliculas/delete/'.$pelicula['id_pelicula']) ?>" 
                               class="btn btn-danger btn-sm">
                               Eliminar
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<?= $this->endSection() ?>