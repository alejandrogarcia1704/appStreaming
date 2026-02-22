<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container">

  <h2 class="mb-4 fw-bold">Panel de Administración - Streaming</h2>

  <div class="row g-4">

    <!-- Películas -->
    <div class="col-md-3">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <i class="bi bi-film fs-1 text-primary"></i>
          <h5 class="mt-3">Películas</h5>
          <a href="<?= base_url('peliculas') ?>" class="btn btn-outline-primary btn-sm mt-2">
            Gestionar
          </a>
        </div>
      </div>
    </div>

    <!-- Consulta Películas -->
    <div class="col-md-3">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <i class="bi bi-search fs-1 text-success"></i>
          <h5 class="mt-3">Consultar Películas</h5>
          <a href="<?= base_url('peliculas/listado') ?>" class="btn btn-outline-success btn-sm mt-2">
            Ver catálogo
          </a>
        </div>
      </div>
    </div>

    <!-- Clientes -->
    <div class="col-md-3">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <i class="bi bi-person fs-1 text-warning"></i>
          <h5 class="mt-3">Clientes</h5>
          <a href="<?= base_url('clientes') ?>" class="btn btn-outline-warning btn-sm mt-2">
            Gestionar
          </a>
        </div>
      </div>
    </div>

    <!-- Usuarios -->
    <div class="col-md-3">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <i class="bi bi-people fs-1 text-danger"></i>
          <h5 class="mt-3">Usuarios</h5>
          <a href="<?= base_url('usuarios') ?>" class="btn btn-outline-danger btn-sm mt-2">
            Gestionar
          </a>
        </div>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection() ?>