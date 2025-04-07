<?php

use Core\Response;

function dd($value)
{
    echo ("<prev>");
    var_dump($value);
    echo ("</prev>");

    die();
}


function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === ($value);
}

function abort($code=403){
    http_response_code($code);

        require base_path("views/{$code}.php");

        die();

}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort();
    }
}


function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path,$attribute=[]){

    extract($attribute);
    require base_path('views/' . $path);
}