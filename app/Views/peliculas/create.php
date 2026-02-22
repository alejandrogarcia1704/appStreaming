<?= $this->extend('Layout/main') ?>
<?= $this->section('content') ?>

<div class="container">
    <h2 class="mb-4">Registrar Nueva Película</h2>

    <form action="<?= base_url('peliculas/store') ?>" 
          method="post" 
          enctype="multipart/form-data">

        <div class="mb-3">
            <label>Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Descripción</label>
            <textarea name="descripcion" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Género</label>
            <input type="text" name="genero" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Año</label>
            <input type="number" name="anio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Duración (minutos)</label>
            <input type="number" name="duracion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Imagen (Portada)</label>
            <input type="file" name="imagen" class="form-control" accept="image/*">
            <small class="text-muted">Formatos permitidos: JPG, PNG, GIF (máx. 2MB)</small>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="<?= base_url('peliculas') ?>" class="btn btn-secondary">Cancelar</a>

    </form>
</div>

<?= $this->endSection() ?>