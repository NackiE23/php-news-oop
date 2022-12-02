<?php

namespace App\Controllers;

class Comment {
    public static function create(string $user_id, string $news_id, string $main_text) {
        $sql = 'INSERT INTO comments (main_text, news_id, user_id) 
                VALUES (:main_text, :news_id, :user_id)';
        
        $stmt = $GLOBALS['db']->prepare($sql);

        $stmt->bindParam(':main_text', $main_text, SQLITE3_TEXT);
        $stmt->bindParam(':news_id', $news_id, SQLITE3_TEXT);
        $stmt->bindParam(':user_id', $user_id, SQLITE3_TEXT);

        return $stmt->execute();
    }

    public static function change(int $comment_id, array $params) {
        $keys = array_keys($params);
        $allow_fields = ['main_text'];

        $sql = "UPDATE comments SET ";
        foreach ($keys as $key) {
            if (in_array($key, $allow_fields)) {
                $sql .= "$key = :$key ,";
            } else {
                unset($keys[$key]);
            }
        }
        $sql = rtrim($sql, ',');
        $sql .= " WHERE id == $comment_id";

        $stmt = $GLOBALS['db']->prepare($sql);
        foreach ($keys as $key) {
            $stmt->bindParam(":$key", $params[$key]);
        }

        return $stmt->execute();
    }

    public static function delete(int $comment_id): \SQLite3Result {
        $sql = 'DELETE FROM comments 
                Where id == :comment_id';

        $stmt = $GLOBALS['db']->prepare($sql);

        $stmt->bindParam(':comment_id', $comment_id, SQLITE3_INTEGER);

        return $stmt->execute();
    }

    public static function check_if_exists(int $news_id): bool {
        $sql = "SELECT COUNT(*) as count
                FROM comments c
                WHERE c.news_id == $news_id";
        
        return $GLOBALS['db']->querySingle($sql) > 0;
    }

    public static function all(int $news_id): \SQLite3Result {
        $sql = "SELECT c.id, c.main_text, c.user_id, u.username 
                FROM comments c 
                JOIN users u
                    ON c.user_id == u.id
                WHERE c.news_id == $news_id";
        
        $stmt = $GLOBALS['db']->prepare($sql);

        $stmt->bindParam(':news_id', $news_id, SQLITE3_INTEGER);

        return $stmt->execute();
    }
}