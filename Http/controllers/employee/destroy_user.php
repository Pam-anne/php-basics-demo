<?php
use Core\Database;

$config = require base_path("config.php");

$db = new Database($config['database']);





$users=$db->query('select * from employee')->all();

$db->query('delete from employee where id = :id',[
    'id'=>$_POST['id']
]);

header('location: /employee');
exit();
