<?php

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Extracts only the path

$routes = [
    "/" => "view/home.view.php",

    "/login" => "view/login.view.php",
    "/register" => "view/register.view.php",

    "/chat/main" => "view/chat/main.view.php",
    "/chat/@me" => "view/chat/@me.view.php"
];

function reroute($request, $routes) {
    if (array_key_exists($request, $routes)) {
        require $routes[$request];
    } else {
        abort();
    }
}


function abort(int $code = 404) {
    http_response_code($code);
    require "view/{$code}.view.php";
    die();
}

reroute($request, $routes);