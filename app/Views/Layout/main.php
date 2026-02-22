<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>
    <?= esc($title ?? 'SHOPSYSTEMCRAZY | Equipa tu mundo digital') ?>
    <?php if (session()->get('usuario')): ?>
      | <?= esc(session()->get('usuario')['rol']) ?>
    <?php endif; ?>
  </title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="<?= base_url('bootstrap-5.3.3/css/bootstrap.min.css') ?>">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <!-- Estilos -->
  <link rel="stylesheet" href="<?= base_url('css/index.styles.css') ?>">
  <link rel="stylesheet" href="<?= base_url('css/footer.styles.css') ?>">

  <?= $this->renderSection('css') ?>

  <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
</head>

<body class="fondo-tech">

  <!-- NAVBAR PRINCIPAL CON MÓDULOS -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">

    <a class="navbar-brand" href="<?= base_url('/') ?>">
        🎬 StreamTH
    </a>

    <?php if(session()->get('isLoggedIn')): ?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <ul class="navbar-nav ms-4">

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('peliculas/create') ?>">
                         Registrar Película
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('peliculas') ?>">
                         Consultar Películas
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('clientes/create') ?>">
                         Registro de Clientes
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('clientes') ?>">
                          Consultar Clientes
                    </a>
                </li>

            </ul>

            <div class="ms-auto text-white">
                👤 <?= session()->get('usuario')['usuario'] ?>

                <a href="<?= base_url('acceso/logout') ?>" 
                   class="btn btn-outline-light btn-sm ms-3">
                   Cerrar Sesión
                </a>
            </div>

        </div>

    <?php else: ?>

        <div class="ms-auto">
            <a href="<?= base_url('acceso/login') ?>" 
               class="btn btn-primary btn-sm">
               Iniciar Sesión
            </a>
        </div>

    <?php endif; ?>

  </nav>

  <!-- NAVBAR SECUNDARIA (para secciones específicas) -->
  <?= $this->renderSection('navbar') ?>

  <!-- TOAST -->
  <div id="toastMount" class="position-fixed top-0 end-0 p-3" style="z-index: 1100;">
    <div id="toastContainer"></div>
  </div>

  <!-- CONTENIDO -->
  <main class="container-fluid py-4 content-wrapper">
    <?= $this->renderSection('content') ?>
  </main>

  <!-- FOOTER -->
  <?= $this->renderSection('footer') ?>

  <!-- SCRIPTS -->
  <script src="<?= base_url('bootstrap-5.3.3/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('JQuery/jquery.min.js') ?>"></script>

  <?= $this->renderSection('scripts') ?>

  <!-- Efecto tipo Netflix para tarjetas de películas -->
  <style>
    .movie-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
        border-radius: 4px;
        overflow: hidden;
    }

    .movie-card:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 30px rgba(0,0,0,0.5);
        z-index: 10;
        position: relative;
    }

    /* Efecto adicional para imágenes dentro de la tarjeta */
    .movie-card img {
        transition: filter 0.3s ease;
        width: 100%;
        height: auto;
    }

    .movie-card:hover img {
        filter: brightness(1.1);
    }

    /* Para contenedores de películas en grid */
    .movies-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        padding: 20px;
    }
  </style>
</body>
</html>