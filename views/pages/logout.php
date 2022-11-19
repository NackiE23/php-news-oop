<?php

use App\Controllers\Auth;
use App\Services\Router;

Auth::logout();
Router::redirect('/');
