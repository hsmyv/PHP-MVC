<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH .'Core/functions.php';

spl_autoload_register(function ($class){

    str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});
// require base_path('core/database.php');
// require base_path('core/Response.php');
// require base_path('core/routes.php');




require base_path("Core/router.php");






