<?php

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Extracts only the path

switch ($request) {
    case "/":
    case "":
        require __DIR__ . "/view/home.view.php";
        break;

    case "/logout":
        require __DIR__ . "/api/Fusion/System/logout.inc.php";
        break;

    default:
        $file = __DIR__ . "/view" . $request . ".view.php";
        if (file_exists($file)) {
            require $file;
            break;
        }
        
        http_response_code(404);
        require __DIR__ . "/view/404.view.php";
        echo $request . " does not exist!";
        break;
}
