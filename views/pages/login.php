<?php

// instructionsglobal settings
use App\Controllers\Auth;
use App\Services\Router;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $success = Auth::login([
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ]);

    if ($success) {
        Router::name_redirect('home_page');
    } else {
        Router::uri_redirect('/login');
    }

    exit();
}


// required data
$title = "Login page";


// call a template
$content_template = "login.php";
require 'views/templates/dafault_template.php';
