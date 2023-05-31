<?php

view('sessions/create.view.php');

use Core\Session;

view('session/create.view.php', [
    'errors' => Session::get('errors')
]);