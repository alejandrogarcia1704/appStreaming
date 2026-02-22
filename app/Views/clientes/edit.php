<?= $this->extend('Layout/main') ?>
<?= $this->section('content') ?>

<div class="container py-5">

    <h2 class="text-white mb-4">Actualizar Cliente</h2>

    <form action="<?= base_url('clientes/update/'.$cliente['id_cliente']) ?>" method="post">

        <div class="mb-3">
            <label class="text-white">Nombre</label>
            <input type="text" name="nombre" 
                   value="<?= esc($cliente['nombre']) ?>" 
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="text-white">Apellido Paterno</label>
            <input type="text" name="apellido_paterno" 
                   value="<?= esc($cliente['apellido_paterno']) ?>" 
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="text-white">Apellido Materno</label>
            <input type="text" name="apellido_materno" 
                   value="<?= esc($cliente['apellido_materno']) ?>" 
                   class="form-control">
        </div>

        <div class="mb-3">
            <label class="text-white">Correo</label>
            <input type="email" name="correo" 
                   value="<?= esc($cliente['correo']) ?>" 
                   class="form-control" required>
        </div>

        <button class="btn btn-success">Actualizar</button>
        <a href="<?= base_url('clientes') ?>" class="btn btn-secondary">Cancelar</a>

    </form>

</div>

<?= $this->endSection() ?>