<?php


use Core\Database;


$config = require base_path("config.php");
$db = new Database($config['database']);

$errors = [];

if (strlen($_POST['name']) === 0) {
    $errors['name'] = 'A name is required';
    $errors['email'] = 'An email is required';
}
if (strlen($_POST['email']) === 0) {
    $errors['email'] = 'An email is required';
}

if (! empty($errors)) {
    return
        view('employee/create.view.php', [
            'heading' => 'Create Employee',
            'errors' => $errors
        ]);
}


$db->query(
    "INSERT INTO users(name,email) VALUES(:name,:email)",
    [
        'name' => $_POST['name'],
        'email' => $_POST['email']
    ]
);


header('location: /employee');
die();
