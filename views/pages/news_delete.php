<?php

// instructions
use App\Controllers\News;
use App\Services\Router;


$success = News::delete($_POST['news_id']);

if ($success) {
    $_SESSION['message'] = ["category" => "success", "text" => "News has been deleted!"];
} else {
    $_SESSION['message'] = ["category" => "danger", "text" => "Database Error - " . $GLOBALS['db']->lastErrorMsg()];
}

Router::redirect('/');
