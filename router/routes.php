<?php

use App\Services\Router;

Router::route('/', 'news_list', ['GET']);
Router::route('/news', 'news_list', ['GET']);
Router::route('/news/create', 'news_create', ['GET', 'POST']);

Router::route('/login', 'login', ['GET', 'POST']);
Router::route('/logout', 'logout', ['GET', 'POST']);
Router::route('/register', 'register', ['GET', 'POST']);

Router::enable();
