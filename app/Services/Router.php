<?php

namespace App\Services;

class Router {
    private static $list = [];

    public static function route(string $uri, string $page_name, array $methods, string $name = null) {
        self::$list[] = [
            "uri" => $uri,
            "page" => $page_name,
            "methods" => $methods,
            "name" => $name,
            "is_reg" => false
        ];
    }

    public static function route_reg(string $uri, string $page_name, array $methods, string $name = null) {
        self::$list[] = [
            "uri" => $uri,
            "page" => $page_name,
            "methods" => $methods,
            "name" => $name,
            "is_reg" => true
        ];
    }

    public static function uri_redirect(string $uri) {
        header("Location: " . $uri);
    }

    public static function name_redirect(string $name) {
        foreach(self::$list as $route) {
            if ($route['name'] && $route['name'] === $name) {
                header("Location: " . $route['uri']);
            }
        }
    }

    public static function raise_error(string $error_code) {
        require_once "views/errors/" . $error_code . ".php";
    }

    public static function enable() {
        $query = $_GET['q'];
        
        foreach(self::$list as $route) {
            if ($route['is_reg']) {
                if (in_array($_SERVER['REQUEST_METHOD'], $route['methods'])) {
                    require_once "views/pages/" . $route['page'] . ".php";
                    exit();
                } else {
                    break;
                }
            } elseif ($route['uri'] === '/' . $query) {
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