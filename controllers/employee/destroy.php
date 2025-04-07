<?php



use Core\Database;

$config = require base_path("config.php");

$db = new Database($config['database']);





$note = $db->query('select * from notes where user_id= :user_id', ['user_id' => $_POST['user_id']])->findorFail();



// authorize($note['user_id'] === 1);
$db->query('delete from notes where user_id= :user_id', [
    'user_id' => $_POST['user_id']
]);

header('location: /employee');
exit();
