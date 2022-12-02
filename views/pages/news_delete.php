<?php

// instructions
use App\Controllers\News;
use App\Services\Router;


$success = News::delete((int)$_POST['news_id']);

if ($success) {
    $_SESSION['messages'][] = ["category" => "success", "text" => "News has been deleted!"];
} else {
    $_SESSION['messages'][] = ["category" => "danger", "text" => "Database Error - " . $GLOBALS['db']->lastErrorMsg()];
}

Router::uri_redirect('/');
