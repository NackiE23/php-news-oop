<?php

namespace App\Services;

class Router {
    private static $list = [];

    public static function route(string $uri, string $page_name, array $methods) {
        self::$list[] = [
            "uri" => $uri,
            "page" => $page_name,
            "methods" => $methods
        ];
    }

    public static function enable() {
        $query = $_GET['q'];
        
        foreach(self::$list as $route) {
            if ($route['uri'] === '/' . $query) {
                if (in_array($_SERVER['REQUEST_METHOD'], $route['methods'])) {
                    require_once "views/pages/" . $route['page'];
                    die();
                } else {
                    break;
                }
            }
        }

        require_once "views/errors/404.php";
    }
}