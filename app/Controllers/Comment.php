<?php

namespace App\Controllers;

class Comment {
    public static function create(string $user_id, string $news_id, string $main_text): bool {
        $sql = 'INSERT INTO comments (main_text, news_id, user_id) 
                VALUES 
                    ("' . $main_text . '","' . $news_id . '","' . $user_id . '")';
        
        return $GLOBALS['db']->exec($sql);
    }

    public static function change($comment_id, array $params): bool {
        $keys = array_keys($params);
        $sql = "UPDATE comments SET ";

        foreach ($keys as $key) {
            $sql .= $key . ' = "' . $params[$key] . '",';
        }

        $sql = rtrim($sql, ',');
        $sql .= ' WHERE comments.id == ' . $comment_id;

        return $GLOBALS['db']->exec($sql);;
    }

    public static function delete($comment_id): bool {
        $sql = "DELETE FROM comments 
                Where id == $comment_id";

        return $GLOBALS['db']->exec($sql);
    }

    public static function check_if_exists($news_id): bool {
        $sql = "SELECT COUNT(*) as count
                FROM comments c
                WHERE c.news_id == $news_id";
        
        return $GLOBALS['db']->querySingle($sql) > 0;
    }

    public static function all($news_id): \SQLite3Result {
        $sql = "SELECT c.id, c.main_text, c.user_id, u.username 
                FROM comments c 
                JOIN users u
                    ON c.user_id == u.id
                WHERE c.news_id == $news_id";
        
        return $GLOBALS['db']->query($sql);
    }
}