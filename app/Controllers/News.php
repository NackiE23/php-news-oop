<?php

namespace App\Controllers;

class News {
    public static function create(array $data): bool {
        $created = date('Y-m-d H:i');
        $user_id = $data['user_id'];
        $title = $data['title'];
        $main_text = $data['main_text'];

        $sql = "INSERT INTO news (created, title, main_text, user_id) 
                VALUES 
                    ('$created', '$title', '$main_text', $user_id)";
        return $GLOBALS['db']->exec($sql);
    }

    public static function all(): \SQLite3Result {
        $sql = "SELECT news.id, news.created, news.title, news.main_text, users.username 
                FROM news 
                JOIN users 
                    ON news.user_id == users.id 
                ORDER BY news.created DESC";
        return $GLOBALS['db']->query($sql);
    }
}