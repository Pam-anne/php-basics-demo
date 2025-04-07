<?php

use Core\Database;

$config = require base_path("config.php");

$db = new Database($config['database']);


$users = $db->query('select * from users where id= :id', ['id' => $_GET['id']])->findorFail();

// authorize($note['user_id'] === 1);

view('employee/edit.view.php',[
    'heading'=>'Edit Employee',
    'errors'=>[],
    'users'=> $users
]);
