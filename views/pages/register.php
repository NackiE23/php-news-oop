<?php

use App\Controllers\Auth;
use App\Services\Router;

// global settings


// required context
$title = "Register page";

// actions
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $success = Auth::register([
        'email' => $_POST['email'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'password_confirm' => $_POST['password_confirm'],
    ]);

    if ($success) {
        Router::redirect('/login');
    } else {
        Router::redirect('/register');
    }

    exit();
}

// call a template
$content_template = "register.php";
require 'views/templates/dafault_template.php';
