<?php



$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/employee', 'employee/index.php')->only('auth');

$router->get('/emp', 'employee/show.php');
$router->delete('/emp', 'employee/destroy.php');

$router->get('/contact', 'contact.php');

$router->get('/employee/create', 'employee/create.php');
$router->post('/employee', 'employee/store.php');
$router->delete('/employee', 'employee/destroy_user.php');

$router->get('/employee/edit', 'employee/edit.php');
$router->patch('/employee', 'employee/update.php');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php');

$router->get('/login', 'login/create.php')->only('guest');
$router->post('/login', 'login/store.php')->only('guest');
$router->delete('/login', 'login/logout.php')->only('auth');


