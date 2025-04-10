<?php

use Core\Database;

$config = require base_path("config.php");

$db = new Database($config['database']);


$note = $db->query('select * from notes where user_id= :user_id', ['user_id' => $_GET['user_id']])->findorFail();

// authorize($note['user_id'] === 1);


view('employee/show.view.php', [
    'heading' => 'Employee Details',
    'note' => $note
]);
