<?php

namespace App\Controllers;

class User {
    public static function create(string $email, string $username, string $password): \SQLite3Result {
        $sql = 'INSERT INTO users (email, username, password) 
                VALUES (:email, :username, :password)';

        $stmt = $GLOBALS['db']->prepare($sql);

        $stmt->bindParam(':email', $email, SQLITE3_TEXT);
        $stmt->bindParam(':username', $username, SQLITE3_TEXT);
        $stmt->bindParam(':password', $password, SQLITE3_TEXT);

        return $stmt->execute();
    }

    public static function delete(int $user_id): \SQLite3Result {
        $sql = 'DELETE FROM users 
                Where id == :user_id';

        $stmt = $GLOBALS['db']->prepare($sql);

        $stmt->bindParam(':user_id', $user_id, SQLITE3_INTEGER);

        return $stmt->execute();
    }

    public static function get(string $email): \SQLite3Result {
        $sql = 'SELECT *
                FROM users
                WHERE email LIKE :email';
        $stmt = $GLOBALS['db']->prepare($sql);

        $stmt->bindParam(':email', $email, SQLITE3_TEXT);
        
        return $stmt->execute();
    }
}