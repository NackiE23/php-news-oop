<?php

namespace App\Services;

class App {
    public static function start() {
        self::db();
    }

    private static function db() {
        $config = require_once "config/db.php";
        $GLOBALS['db'] = new Database($config['path']);
    }
}
