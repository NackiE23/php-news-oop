<?php

namespace App\Services;

class App {
    public static function start() {
        self::db();
    }

    private static function db() {
        $config = require_once "config/db.php";
        defined('DB_PATH') || define('DB_PATH', $config['path']);
    }
}
