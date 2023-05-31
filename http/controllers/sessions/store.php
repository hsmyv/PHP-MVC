<?php

use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

public function __construct($attributes)
{

}
if ($form->validate($email, $password)) {

    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }
    $form->error('email', 'No matching account found for that email and password');
}



Session::flash('errors', $form->errors());

Session::flash('old', ['email' => $_POST['email']]);

return redirect('/login');
