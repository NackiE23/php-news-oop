<?php

// instructions
use App\Controllers\News;
use App\Services\Router;

$news_id = $_POST['news_id'];
unset($_POST['news_id']);

$success = News::change($news_id, $_POST);

if ($success) {
    $_SESSION['messages'][] = ["category" => "success", "text" => "News has been deleted!"];
} else {
    $_SESSION['messages'][] = ["category" => "danger", "text" => "Database Error - " . $GLOBALS['db']->lastErrorMsg()];
}

Router::uri_redirect('/news?id=' . $news_id);
