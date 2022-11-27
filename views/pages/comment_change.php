<?php

// instructions

use App\Controllers\Comment;
use App\Services\Router;

$comment_id = $_POST['comment_id'];
$news_id = $_POST['news_id'];
unset($_POST['comment_id']);
unset($_POST['news_id']);

$success = Comment::change($comment_id, $_POST);

if ($success) {
    $_SESSION['messages'][] = ["category" => "success", "text" => "Comment has been changed!"];
} else {
    $_SESSION['messages'][] = ["category" => "danger", "text" => "Database Error - " . $GLOBALS['db']->lastErrorMsg()];
}

Router::redirect('/news?id=' . $news_id);
