<?php

use Http\Forms\LoginForm;
use Core\Authenticator;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);




$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);
if (!$signedIn) {
    $form->error('email', 'No matching account found for that email and password')->throw();
}

redirect('/');
