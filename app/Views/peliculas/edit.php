<?= $this->extend('Layout/main') ?>
<?= $this->section('content') ?>

<div class="container py-5">

    <h2 class="text-white mb-4">Editar Película</h2>

    <form action="<?= base_url('peliculas/update/'.$pelicula['id_pelicula']) ?>" 
          method="post" 
          enctype="multipart/form-data">

        <div class="mb-3">
            <label class="text-white">Título</label>
            <input type="text" name="titulo" 
                   value="<?= esc($pelicula['titulo']) ?>" 
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="text-white">Descripción</label>
            <textarea name="descripcion" 
                      class="form-control" required><?= esc($pelicula['descripcion']) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="text-white">Género</label>
            <input type="text" name="genero" 
                   value="<?= esc($pelicula['genero']) ?>" 
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="text-white">Año</label>
            <input type="number" name="anio" 
                   value="<?= esc($pelicula['anio']) ?>" 
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="text-white">Duración (minutos)</label>
            <input type="number" name="duracion" 
                   value="<?= esc($pelicula['duracion']) ?>" 
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="text-white">Imagen actual</label><br>

            <?php if(!empty($pelicula['imagen'])): ?>
                <img src="<?= base_url('uploads/'.$pelicula['imagen']) ?>" 
                     style="height:200px;" 
                     class="mb-3 rounded shadow">
            <?php endif; ?>

            <input type="file" name="imagen" class="form-control">
            <small class="text-light">Si no seleccionas una nueva imagen, se conservará la actual.</small>
        </div>

        <button class="btn btn-warning">Actualizar</button>
        <a href="<?= base_url('peliculas') ?>" class="btn btn-secondary">Cancelar</a>

    </form>

</div>

<?= $this->endSection() ?>