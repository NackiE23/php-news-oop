<?php

// instructions

use App\Controllers\Comment;
use App\Controllers\News;
use App\Services\Router;

if (!$_GET['id']) {
    Router::uri_redirect('/');
}


// required data
$res = News::get((int)$_GET['id']);
$news = $res->fetchArray(SQLITE3_ASSOC);
if (!$news) {
    Router::uri_redirect('/');
}

$news_owner = $news['user_id'] == $_SESSION['user']['id'];

$title = $news['title'];
$is_comments_exist = Comment::check_if_exists((int)$news['id']);
if ($is_comments_exist) {
    $comments = Comment::all($news['id']);
}


// call a template
$content_template = "news.php";
require 'views/templates/dafault_template.php';
