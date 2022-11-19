<?php

use App\Services\Router;

Router::route('/', 'home', ['GET']);
Router::route('/login', 'login', ['GET', 'POST']);
Router::route('/logout', 'logout', ['GET', 'POST']);
Router::route('/register', 'register', ['GET', 'POST']);

Router::enable();
