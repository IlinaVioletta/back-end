<?php

require_once __DIR__ . '/vendor/autoload.php';

use guestbook\Controllers\GuestbookController;
use guestbook\Controllers\RegisterController;
use guestbook\Controllers\LoginController;
use guestbook\Controllers\LogoutController;

session_start();

$route = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($route === '/index.php') {
    $route = '/';
}

switch ($route) {
    case '/':
        require __DIR__ . '/Views/homeView.php';
        break;

    case '/guestbook':
        $controller = new GuestbookController();
        $controller->execute();
        break;

    case '/register':
        $controller = new RegisterController();
        $controller->execute();
        break;

    case '/login':
        $controller = new LoginController();
        $controller->execute();
        break;

    case '/logout':
        $controller = new LogoutController();
        $controller->execute();
        break;

    default:
        http_response_code(404);
        echo '404 Not Found';
        break;
}