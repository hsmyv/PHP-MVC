<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];


$errors = [];

if(!validator::email($email)){
    $errors['email'] = 'Please provide a valid email address.';
}

if (!validator::string($password)) {
    $errors['password'] = 'Please provide a password';
}

if (!empty($errors)) {
    view("sessions/create.view.php", [
        'errors'   => $errors
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('location: /');
        exit();
    }
}

return view("sessions/create.view.php",[
    'errors' => [
        'email' => 'No matching account found for that email address and password'
    ]
    ]);

