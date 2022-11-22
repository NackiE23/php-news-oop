<?php

namespace App\Controllers;

class News {
    public static function create(string $user_id, string $title, string $main_text): bool {
        $created = date('Y-m-d H:i');

        $sql = 'INSERT INTO news (created, title, main_text, user_id) 
                VALUES 
                    ("' . $created . '","' . $title . '","' . $main_text . '","' . $user_id . '")';

        return $GLOBALS['db']->exec($sql);
    }

    public static function delete($news_id): bool {
        $sql = "DELETE FROM news 
                Where id == $news_id";

        return $GLOBALS['db']->exec($sql);
    }

    public static function get(int $news_id): array {
        $sql = "SELECT n.id, n.created, n.title, n.main_text, n.user_id, u.username
                FROM news n
                JOIN users u
                    ON n.user_id == u.id
                WHERE n.id = $news_id";
        
        return $GLOBALS['db']->querySingle($sql, true);
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