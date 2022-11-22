<?php

// instructions
use App\Controllers\Comment;
use App\Services\Router;

$success = Comment::create($_POST['user_id'], $_POST['news_id'], $_POST['main_text']);

if ($success) {
    $_SESSION['message'] = ["category" => "success", "text" => "Comment has been added!"];
} else {
    $_SESSION['message'] = ["category" => "danger", "text" => "Database Error - " . $GLOBALS['db']->lastErrorMsg()];
}
Router::redirect('/news?id=' . $_POST['news_id']);