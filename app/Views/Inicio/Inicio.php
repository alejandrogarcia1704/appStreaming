<?= $this->extend('Layout/main') ?>
<?= $this->section('content') ?>

<div class="container py-5">

    <h2 class="text-white mb-4">🎬 Películas Disponibles</h2>

    <div class="row">

        <?php if(!empty($peliculas)): ?>
            <?php foreach($peliculas as $pelicula): ?>
                <div class="col-md-3 mb-4">

                    <div class="card bg-dark text-white border-0 shadow-sm h-100">

                        <?php if(!empty($pelicula['imagen'])): ?>
                            <img src="<?= base_url('uploads/'.$pelicula['imagen']) ?>"
                                 class="card-img-top"
                                 style="height:300px; object-fit:cover;">
                        <?php else: ?>
                            <img src="<?= base_url('images/default.jpg') ?>"
                                 class="card-img-top"
                                 style="height:300px; object-fit:cover;">
                        <?php endif; ?>

                        <div class="card-body d-flex flex-column">

                            <h5 class="card-title">
                                <?= esc($pelicula['titulo']) ?>
                            </h5>

                            <p class="small text-warning">
                                <?= esc($pelicula['genero']) ?> • 
                                <?= esc($pelicula['anio']) ?>
                            </p>

                            <div class="mt-auto">
                                <a href="<?= base_url('peliculas/ver/'.$pelicula['id_pelicula']) ?>"
                                   class="btn btn-primary btn-sm w-100">
                                   Ver Detalle
                                </a>
                            </div>

                        </div>

                    </div>

                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-white">No hay películas registradas.</p>
        <?php endif; ?>

    </div>

</div>

<?= $this->endSection() ?>