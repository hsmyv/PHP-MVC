<?php
use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);;
    echo "</pre>";

    die();
}


function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] == $value;
}

//current user id sehvlik var
function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/' . $path);
}
