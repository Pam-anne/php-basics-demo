<?php



use Http\Form\LoginForm;
use Core\Authenticator;
use Core\Session;



$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);



// If validation passes but authentication fails
if (!(new Authenticator)->attempt($attributes['email'], $attributes['password'])) {
    // Add authentication error
    $form->error('email', 'No matching account found for that email address and password');

    // Flash the errors and old input to the session
    Session::flash('errors', $form->errors());
    Session::flash('old', [
        'email' => $attributes['email']
    ]);

    return redirect('/login');
}

// Authentication successful
redirect('/');
