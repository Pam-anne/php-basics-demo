<?php


use Core\Database;

$config = require base_path("config.php");

$db = new Database($config['database']);





$users=$db->query('select * from employee')->all();


view('employee/index.view.php',[
    'heading'=>'Employee',
    'users' =>$users
]);
