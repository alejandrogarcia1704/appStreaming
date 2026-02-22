<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Home::index');
});

// Ruta para el dashboard (sin filtro de autenticación)
$routes->get('/dashboard', 'Home::dashboard');

//$routes->get('/', 'Home::index');

// ! Login 
$routes->get('acceso/login', 'AccesoController::loginShowForm');
$routes->post('acceso/login', 'AccesoController::login');
$routes->get('acceso/logout', 'AccesoController::logout');

// ! Routes for Peliculas
$routes->get('peliculas', 'Peliculas::index');
$routes->get('peliculas/create', 'Peliculas::create');
$routes->post('peliculas/store', 'Peliculas::store');
$routes->get('peliculas/edit/(:num)', 'Peliculas::edit/$1');
$routes->post('peliculas/update/(:num)', 'Peliculas::update/$1');
$routes->get('peliculas/delete/(:num)', 'Peliculas::delete/$1');
$routes->get('peliculas/ver/(:num)', 'Peliculas::ver/$1');
$routes->get('clientes', 'Clientes::index');
$routes->get('clientes/create', 'Clientes::create');
$routes->post('clientes/store', 'Clientes::store');
$routes->get('clientes/delete/(:num)', 'Clientes::delete/$1');
$routes->get('clientes/edit/(:num)', 'Clientes::edit/$1');
$routes->post('clientes/update/(:num)', 'Clientes::update/$1');
$routes->get('clientes/toggle/(:num)', 'Clientes::toggle/$1');
$routes->get('peliculas/edit/(:num)', 'Peliculas::edit/$1');
$routes->post('peliculas/update/(:num)', 'Peliculas::update/$1');

// ! Routes of API´s
$routes->group('api', ['namespace' => 'App\Controllers\Api'], static function ($routes) {
    $routes->resource('categorias', [
        'controller' => 'Categorias',
        'only'       => ['index', 'show', 'create', 'update', 'delete'],
    ]);

    $routes->resource('productos', [
        'controller' => 'Productos',
        'only'       => ['index', 'show', 'create', 'update', 'delete'],
    ]);

    $routes->resource('ventas', [
        'controller' => 'Ventas',
        'only'       => ['index', 'show', 'create', 'update', 'delete'],
    ]);

    $routes->get('ventas/(:num)/detalles',  'DetalleVentas::index/$1');
    $routes->post('ventas/(:num)/detalles', 'DetalleVentas::create/$1');
    

    $routes->post('auth/device-login', 'AuthDispositivo::deviceLogin');
});
$routes->get('uploads/(:any)', 'Uploads::show/$1');