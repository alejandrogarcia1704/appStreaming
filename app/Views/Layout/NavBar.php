<?php
$user = session()->get('usuario') ?? [];
$isLoggedIn = (bool) (session()->get('isLoggedIn') ?? false);
?>

<?= $this->section('navbar') ?>

<!-- NAVBAR PRINCIPAL -->
<nav class="navbar navbar-expand-lg navbar-tech sticky-top px-3">
  <div class="container-fluid">

    <!-- Marca -->
    <a class="navbar-brand brand-tech fw-bold" href="<?= base_url('/') ?>">
      #SHOPSYSTEMCRAZY
    </a>

    <!-- Botón móvil -->
    <button class="navbar-toggler text-white" type="button" data-bs-toggle="offcanvas"
      data-bs-target="#sidebar">
      <i class="bi bi-list fs-3"></i>
    </button>

    <!-- Opciones derecha -->
    <div class="d-none d-lg-flex align-items-center gap-3 ms-auto">

      <a href="<?= base_url('productos') ?>" class="nav-link text-white">
        <i class="bi bi-cpu"></i> Componentes
      </a>

      <a href="<?= base_url('carrito') ?>" class="nav-link text-white position-relative">
        <i class="bi bi-cart3 fs-5"></i>
      </a>

      <?php if ($isLoggedIn): ?>
        <span class="text-white small">
          <i class="bi bi-person-circle"></i>
          <?= esc($user['nombre'] ?? 'Usuario') ?>
        </span>
        <a href="<?= site_url('acceso/logout') ?>" class="btn btn-sm btn-outline-light">
          Salir
        </a>
      <?php else: ?>
        <a href="<?= base_url('login') ?>" class="btn btn-sm btn-light">
          Iniciar sesión
        </a>
      <?php endif; ?>

    </div>
  </div>
</nav>

<!-- SIDEBAR -->
<div class="offcanvas offcanvas-start sidebar-tech text-white"
     tabindex="-1"
     id="sidebar">

  <div class="offcanvas-header">
    <h5>#SHOPSYSTEMCRAZY</h5>
    <button type="button" class="btn-close btn-close-white"
      data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body">

    <nav class="nav flex-column gap-2">

      <a class="nav-link text-white" href="<?= base_url('/') ?>">
        <i class="bi bi-house"></i> Inicio
      </a>

      <a class="nav-link text-white" href="<?= base_url('productos') ?>">
        <i class="bi bi-motherboard"></i> Componentes
      </a>

      <a class="nav-link text-white" href="<?= base_url('categorias') ?>">
        <i class="bi bi-grid"></i> Categorías
      </a>

      <a class="nav-link text-white" href="<?= base_url('ofertas') ?>">
        <i class="bi bi-lightning-charge"></i> Ofertas
      </a>

      <hr class="text-white-50">

      <a class="nav-link text-white-50" href="<?= base_url('contacto') ?>">
        <i class="bi bi-envelope"></i> Contacto
      </a>

    </nav>
  </div>
</div>

<?= $this->endSection() ?>
