<?php

namespace App\Controllers;

class News {
    public static function create(string $user_id, string $title, string $main_text): \SQLite3Result {
        $created = date('Y-m-d H:i');

        $sql = 'INSERT INTO news (created, title, main_text, user_id) 
                VALUES (:created, :title, :main_text, :user_id)';

        $stmt = $GLOBALS['db']->prepare($sql);

        $stmt->bindParam(':created', $created, SQLITE3_TEXT);
        $stmt->bindParam(':title', $title, SQLITE3_TEXT);
        $stmt->bindParam(':main_text', $main_text, SQLITE3_TEXT);
        $stmt->bindParam(':user_id', $user_id, SQLITE3_TEXT);

        return $stmt->execute();
    }

    public static function change(int $news_id, array $params): \SQLite3Result {
        $keys = array_keys($params);
        $allow_fields = ['title', 'main_text'];

        $sql = "UPDATE news SET ";
        foreach ($keys as $key) {
            if (in_array($key, $allow_fields)) {
                $sql .= "$key = :$key ,";
            } else {
                unset($keys[$key]);
            }
        }
        $sql = rtrim($sql, ',');
        $sql .= " WHERE news.id == $news_id";

        $stmt = $GLOBALS['db']->prepare($sql);
        foreach ($keys as $key) {
            $stmt->bindParam(":$key", $params[$key]);
        }

        return $stmt->execute();
    }

    public static function delete(int $news_id): \SQLite3Result {
        $sql = 'DELETE FROM news 
                Where id == :news_id';

        $stmt = $GLOBALS['db']->prepare($sql);

        $stmt->bindParam(':news_id', $news_id, SQLITE3_INTEGER);

        return $stmt->execute();
    }

    public static function get($news_id): \SQLite3Result {
        $sql = "SELECT n.id, n.created, n.title, n.main_text, n.user_id, u.username
                FROM news n
                JOIN users u
                    ON n.user_id == u.id
                WHERE n.id = $news_id";
        
        $stmt = $GLOBALS['db']->prepare($sql);

        $stmt->bindParam(':news_id', $news_id, SQLITE3_INTEGER);

        return $stmt->execute();
    }

    public static function all(): \SQLite3Result {
        $sql = "SELECT n.id, n.created, n.title, n.main_text, n.user_id, u.username 
                FROM news n
                JOIN users u
                    ON n.user_id == u.id 
                ORDER BY n.created DESC";
        
        return $GLOBALS['db']->query($sql);
    }
}