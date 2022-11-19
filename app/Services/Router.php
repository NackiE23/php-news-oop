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

    public static function redirect($uri) {
        header("Location: " . $uri);
    }

    public static function raise_error($error_code) {
        require_once "views/errors/" . $error_code . ".php";
    }

    public static function enable() {
        $query = $_GET['q'];
        
        foreach(self::$list as $route) {
            if ($route['uri'] === '/' . $query) {
                if (in_array($_SERVER['REQUEST_METHOD'], $route['methods'])) {
                    require_once "views/pages/" . $route['page'] . ".php";
                    exit();
                } else {
                    break;
                }
            }
        }

        Router::raise_error('404');
    }
}