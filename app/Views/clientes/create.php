<?= $this->extend('Layout/main') ?>
<?= $this->section('content') ?>

<div class="container py-5">

    <h2 class="text-white mb-4">Registrar Cliente</h2>

    <form action="<?= base_url('clientes/store') ?>" method="post">

        <div class="mb-3">
            <label class="text-white">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="text-white">Apellido Paterno</label>
            <input type="text" name="apellido_paterno" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="text-white">Apellido Materno</label>
            <input type="text" name="apellido_materno" class="form-control">
        </div>

        <div class="mb-3">
            <label class="text-white">Correo</label>
            <input type="email" name="correo" class="form-control" required>
        </div>

        <button class="btn btn-primary">Guardar</button>
        <a href="<?= base_url('clientes') ?>" class="btn btn-secondary">Cancelar</a>

    </form>

</div>

<?= $this->endSection() ?>