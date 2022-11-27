<?php

namespace App\Controllers;

class User {
    public static function create(string $email, string $username, string $password): bool {
        $sql = 'INSERT INTO users (email, username, password) 
                VALUES 
                    ("' . $email . '", "' . $username . '", "' . $password . '")';

        return $GLOBALS['db']->exec($sql);
    }

    public static function delete($user_id): bool {
        $sql = "DELETE FROM users 
                Where id == $user_id";

        return $GLOBALS['db']->exec($sql);
    }

    public static function get($email): array {
        $sql = "SELECT id, email, username, password, is_admin
                FROM users
                WHERE email LIKE '" . $email . "'";
        
        return $GLOBALS['db']->querySingle($sql, true);
    }
}