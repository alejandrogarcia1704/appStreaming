<?= $this->extend('Layout/main') ?>
<?= $this->section('content') ?>

<div class="container py-5">

    <h2 class="text-white mb-4">👥 Clientes Registrados</h2>

    <a href="<?= base_url('clientes/create') ?>" class="btn btn-success mb-3">
        Nuevo Cliente
    </a>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Correo</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach($clientes as $cliente): ?>
            <tr>
                <td>
                    <?= esc($cliente['nombre'].' '.$cliente['apellido_paterno'].' '.$cliente['apellido_materno']) ?>
                </td>
                <td><?= esc($cliente['correo']) ?></td>
                <td><?= esc($cliente['fecha_registro']) ?></td>
                <td>
                    <a href="<?= base_url('clientes/edit/'.$cliente['id_cliente']) ?>" 
                       class="btn btn-warning btn-sm">
                       Actualizar
                    </a>

                    <a href="<?= base_url('clientes/toggle/'.$cliente['id_cliente']) ?>" 
                       class="btn btn-<?= $cliente['activo'] ? 'primary' : 'secondary' ?> btn-sm">
                       <?= $cliente['activo'] ? 'Desactivar' : 'Activar' ?>
                    </a>

                    <a href="<?= base_url('clientes/delete/'.$cliente['id_cliente']) ?>" 
                       class="btn btn-danger btn-sm">
                       Eliminar
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>

</div>

<?= $this->endSection() ?>