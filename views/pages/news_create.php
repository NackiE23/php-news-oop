<?php

// instructions
use App\Controllers\News;
use App\Services\Router;

if (!$_SESSION['user']) {
    Router::redirect('/');    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = News::create([
        'user_id' => $_POST['user_id'],
        'title' => $_POST['title'],
        'main_text' => $_POST['main_text']
    ]);

    if ($success) {
        $_SESSION['message'] = ["category" => "success", "text" => "News has been added!"];
        Router::redirect('/');
    } else {
        $_SESSION['message'] = ["category" => "danger", "text" => "Database Error - " . $GLOBALS['db']->lastErrorMsg()];
        Router::redirect('/news/create');
    }
}


// required data
$title = "Create news";


// call a template
$content_template = "news_create.php";
require 'views/templates/dafault_template.php';
