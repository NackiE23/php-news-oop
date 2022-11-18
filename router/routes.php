<?php

use App\Services\Router;

Router::route('/', 'home.php', ['GET']);
Router::route('/login', 'login.php', ['GET', 'POST']);
Router::route('/logout', 'logout.php', ['POST']);
Router::route('/register', 'register.php', ['GET', 'POST']);

Router::enable();
