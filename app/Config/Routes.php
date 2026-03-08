<?php

namespace Config;

use CodeIgniter\Config\Services;

$routes = Services::routes();

/*
---------------------------------------------------------------
Load System's Routing File First
---------------------------------------------------------------
*/
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
---------------------------------------------------------------
Router Setup
---------------------------------------------------------------
*/

$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('loginView');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
---------------------------------------------------------------
Route Definitions
---------------------------------------------------------------
*/

$routes->get('/', 'Auth::loginView');

$routes->post('/login', 'Auth::login');

$routes->get('/register', 'Auth::registerView');
$routes->post('/register', 'Auth::register');

$routes->get('/chat', 'Chat::index');
$routes->get('/chat/conversation/(:num)', 'Chat::conversation/$1');

$routes->post('/sendMessage', 'Chat::sendMessage');
$routes->get('/getMessages/(:num)', 'Chat::getMessages/$1');

$routes->post('/upload', 'Upload::uploadFile');

$routes->get('/forgot', 'Auth::forgotView');
$routes->post('/forgot', 'Auth::forgotPassword');

/*
---------------------------------------------------------------
Additional Environment Routes
---------------------------------------------------------------
*/

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}