<?php

// instructions

use App\Controllers\Comment;
use App\Controllers\News;
use App\Services\Router;

if (!$_GET['id']) {
    Router::redirect('/');
}

// $str = "/news/23234";
// $pattern = "/\d+/";
// echo preg_match($pattern, $str, $output);
// print_r($output);


// required data
$news = News::get($_GET['id']);
$news_owner = $news['user_id'] == $_SESSION['user']['id'];

$title = $news['title'];
$is_comments_exist = Comment::check_if_exists($news['id']);
if ($is_comments_exist) {
    $comments = Comment::all($news['id']);
}


// call a template
$content_template = "news.php";
require 'views/templates/dafault_template.php';
