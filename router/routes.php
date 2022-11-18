<?php

use App\Services\Router;

Router::route('/', 'home.php');
Router::route('/login', 'login.php');
Router::route('/logout', 'logout.php');
Router::route('/register', 'register.php');


Router::enable();
