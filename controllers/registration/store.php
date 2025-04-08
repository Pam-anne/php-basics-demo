<?php

use Core\Database;

$config = require base_path("config.php");

$db = new Database($config['database']);



$email=$_POST['email'];
$password=$_POST['password'];

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

// Sanitize inputs
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$password = htmlspecialchars(trim($password)); // Sanitize password to prevent XSS

//check if there exist validation errors,if so it reloads the page and return the create page
if (!empty($errors)){
    return view('registration/create.view.php',[
        'errors'=>$errors
    ]);
}

// check if the account exist
$user=$db->query('select * from users where email= :email',[
    'email'=>$email
])->find();

if($user){
    //if the user already exist the redirect to logiin
    header('location: /');
    exit();
}else{
    //if not,save to db and the log user
    $db->query('INSERT INTO users(email,password) values(:email,:password)',[
        'email'=>$email,
        'password'=>password_hash($password, PASSWORD_BCRYPT)     //hashing passowrd
    ]);

    //mark the user has logged in
    login($user);

    header('location: /');
    exit();

}