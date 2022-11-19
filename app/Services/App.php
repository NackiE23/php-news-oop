<?php

namespace App\Services;

class App {
    public static function start() {
        self::db();
    }

    private static function db() {
        $config = require_once "config/db.php";
        $db_path = $config['path'];
    }
}