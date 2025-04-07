<?php



$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/employee', 'controllers/employee/index.php');

$router->get('/emp', 'controllers/employee/show.php');
$router->delete('/emp', 'controllers/employee/destroy.php');

$router->get('/contact', 'controllers/contact.php');

$router->get('/employee/create', 'controllers/employee/create.php');
$router->post('/employee', 'controllers/employee/store.php');
$router->delete('/employee', 'controllers/employee/destroy_user.php');

$router->get('/employee/edit', 'controllers/employee/edit.php');
$router->patch('/employee', 'controllers/employee/update.php');