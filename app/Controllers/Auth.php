<?php

namespace App\Controllers;
use App\Services\Router;

class Auth {
    public static function register(array $data): bool {
        $email = $data['email'];
        $username = $data['username'];
        $password = $data['password'];
        $password_confirm = $data['password_confirm'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if ($password === $password_confirm) {
            $sql = "INSERT INTO users (email, username, password) VALUES ('" . $email . "', '" . $username . "', '" . $hashed_password . "')";
            $res = $GLOBALS['db']->exec($sql);
    
            $errorMsg = $GLOBALS['db']->lastErrorMsg();
    
            if ($res) {
                $_SESSION['message'] = ["category" => "success", "text" => "You successfuly registered! Log in please"];
                return true;
            } else {
                $_SESSION['message'] = ["category" => "danger", "text" => "SQLite Error - $errorMsg"];
                return false;
            }
        } else {
            $_SESSION['message'] = ["category" => "danger", "text" => "Passwords do not match!"];
            return false;
        }
    }

    public static function login(array $data): bool {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email LIKE '$email'";
        $responce = $GLOBALS['db']->query($sql);

        if ($responce) {
            $result = $responce->fetchArray(SQLITE3_ASSOC);

            if (password_verify($password, $result['password'])) {
                $_SESSION['user'] = $result;
                $_SESSION['message'] = ["category" => "success", "text" => "You successfuly logged in, {$result['username']}!"];
                return true;
            } else {
                $_SESSION['message'] = ["category" => "danger", "text" => "Wrong password or email!"];
                return false;
            }
        } else {
            $_SESSION['message'] = ["category" => "danger", "text" => "Wrong password or email!"];
            return false;
        }
    }

    public static function logout(){
        unset($_SESSION['user']);
        $_SESSION['message'] = ['category' => 'success', 'text' => 'You successfuly logged out!'];
    }
}