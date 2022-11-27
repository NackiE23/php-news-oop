<?php

// instructions
use App\Controllers\Auth;
use App\Services\Router;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $success = Auth::register([
        'email' => $_POST['email'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'password_confirm' => $_POST['password_confirm'],
    ]);

    if ($success) {
        Router::uri_redirect('/login');
    } else {
        Router::uri_redirect('/register');
    }

    exit();
}


// required context
$title = "Register page";


// call a template
$content_template = "register.php";
require 'views/templates/dafault_template.php';
