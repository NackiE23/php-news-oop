<?php

use App\Controllers\Auth;
use App\Services\Router;

// global settings


// required context
$title = "Register page";

// actions
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    Auth::register(['fname' => 'Igor']);
    Router::redirect('/login');
    exit();
}

// call a template
$content_template = "register.php";
require 'views/templates/dafault_template.php';
