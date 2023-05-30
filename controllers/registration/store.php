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

if (!validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least seven characters.';
}

if (!empty($errors)) {
    view("registration/create.view.php", [
        'errors'   => $errors
    ]);
}

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();


if($user){
    header('location: /');
}else{
    $db->query('INSERT INTO users (email,password) Values (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login($user);


    header('location: /');
    exit();
}


?>