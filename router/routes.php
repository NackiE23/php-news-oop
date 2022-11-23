<?php

use App\Services\Router;

Router::route('/', 'news_list', ['GET']);
Router::route('/news', 'news', ['GET']);
Router::route('/news/create', 'news_create', ['GET', 'POST']);
Router::route('/news/change', 'news_change', ['POST']);
Router::route('/news/delete', 'news_delete', ['POST']);

Router::route('/comment/create', 'comment_create', ['POST']);
Router::route('/comment/change', 'comment_change', ['POST']);
Router::route('/comment/delete', 'comment_delete', ['POST']);

Router::route('/login', 'login', ['GET', 'POST']);
Router::route('/logout', 'logout', ['GET', 'POST']);
Router::route('/register', 'register', ['GET', 'POST']);

Router::enable();
