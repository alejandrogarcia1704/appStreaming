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