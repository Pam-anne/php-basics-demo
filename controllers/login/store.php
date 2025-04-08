<?php


use Core\Database;

$config = require base_path("config.php");

$db = new Database($config['database']);



$email = $_POST['email'];
$password = $_POST['password'];

// Validate the form inputs
$errors = [];

// Check if email is empty
if (!isset($email) || trim($email) === '') {
    $errors['email'] = 'Please provide a valid email.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Check if the email is in a valid format
    $errors['email'] = 'Please provide a valid email address.';
}

// Check if password is empty
if (!isset($password) || trim($password) === '') {
    $errors['password'] = 'Please provide a valid password.';
} elseif (strlen($password) < 6) {
    // Check if password is at least 6 characters
    $errors['password'] = 'Password must be at least 6 characters long.';
}

//check if there exist validation errors,if so it reloads the page and return the login page
if (!empty($errors)) {
    return view('login/create.view.php', [
        'errors' => $errors
    ]);
}

//match the credentials
$user = $db->query('select * from users where email= :email', [
    'email' => $email
])->find();

//if the user exist but the password provided doesnt match the one in datatabase


if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);
    
        header('location: /');
        exit();
    }
}

return view('login/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password'
    ]
]);