<?php

// instructions
use App\Controllers\Comment;
use App\Services\Router;

$success = Comment::delete((int)$_POST['comment_id']);

if ($success) {
    $_SESSION['messages'][] = ["category" => "success", "text" => "Comment has been deleted!"];
} else {
    $_SESSION['messages'][] = ["category" => "danger", "text" => "Database Error - " . $GLOBALS['db']->lastErrorMsg()];
}

Router::uri_redirect('/news?id=' . $_POST['news_id']);
