<?php

namespace App\Controllers;

use App\Controllers\User;

class Auth {
    public static function register(array $data): bool {
        $email = $data['email'];
        $username = $data['username'];
        $password = $data['password'];
        $password_confirm = $data['password_confirm'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if ($password === $password_confirm) {
            $res = User::create($email, $username, $hashed_password);
    
            $errorMsg = $GLOBALS['db']->lastErrorMsg();
    
            if ($res) {
                $_SESSION['messages'][] = ["category" => "success", "text" => "You successfuly registered! Log in please"];
                return true;
            } else {
                $_SESSION['messages'][] = ["category" => "danger", "text" => "SQLite Error - $errorMsg"];
            }
        } else {
            $_SESSION['messages'][] = ["category" => "danger", "text" => "Passwords do not match!"];
        }

        return false;
    }

    public static function login(array $data): bool {
        $email = $data['email'];
        $password = $data['password'];

        $res = User::get($email);

        if ($res) {
            $user = $res->fetchArray(SQLITE3_ASSOC);

            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                $_SESSION['messages'][] = ["category" => "success", "text" => "You successfuly logged in, " . htmlspecialchars($user['username']) . "!"];
                return true;
            } else {
                $_SESSION['messages'][] = ["category" => "danger", "text" => "Wrong password or email!"];
            }
        } else {
            $_SESSION['messages'][] = ["category" => "danger", "text" => "Wrong password or email!"];    
        }

        return false;
    }

    public static function logout(): void {
        unset($_SESSION['user']);
        $_SESSION['messages'][] = ['category' => 'success', 'text' => 'You successfuly logged out!'];
    }
}