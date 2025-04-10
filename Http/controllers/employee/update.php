<?php

use Core\Database;

$config = require base_path("config.php");

$db = new Database($config['database']);

$currentuser = 2;
//find the corresponding user

$user = $db->query('SELECT * FROM employee WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// authorize
authorize($user['id'] === $currentuser);

// validate the form
$errors = [];

if(!isset($_POST['name']) || trim($_POST['name']) === ''){
    $errors['name'] = 'A name is required';
}

if(!isset($_POST['email']) || trim($_POST['email']) === ''){
    $errors['email'] = 'An email is required';
}

// if validation fails, return to the EDIT form with errors
if(count($errors)){
    return view('employee/edit.view.php',[
        'heading' => 'Employee',
        'users' => $user, // Pass just the single user being edited
        'errors' => $errors
    ]);
}

// if no validation errors, update the record in users database table
$db->query('update employee set name = :name, email = :email where id = :id',[
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'email' => $_POST['email']
]);

//redirect the user
header('location: /employee');
die();