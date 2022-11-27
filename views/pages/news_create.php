<?php

// instructions
use App\Controllers\News;
use App\Services\Router;

if (!$_SESSION['user']) {
    Router::uri_redirect('/');    
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = News::create($_POST['user_id'], $_POST['title'], $_POST['main_text']);
    
    if ($success) {
        $_SESSION['messages'][] = ["category" => "success", "text" => "News has been added!"];
        Router::uri_redirect('/');
    } else {
        $_SESSION['messages'][] = ["category" => "danger", "text" => "Database Error - " . $GLOBALS['db']->lastErrorMsg()];
        Router::uri_redirect('/news/create');
    }

    exit();
}


// required data
$title = "Create news";


// call a template
$content_template = "news_create.php";
require 'views/templates/dafault_template.php';
