<?php

// instructions
use App\Controllers\Comment;
use App\Services\Router;

$success = Comment::delete($_POST['comment_id']);

if ($success) {
    $_SESSION['message'] = ["category" => "success", "text" => "Comment has been deleted!"];
} else {
    $_SESSION['message'] = ["category" => "danger", "text" => "Database Error - " . $GLOBALS['db']->lastErrorMsg()];
}

Router::redirect('/news?id=' . $_POST['news_id']);
