<?php

namespace guestbook\Models;

use PDO;

class Comment extends BaseModel
{
    public static function getAll(): array
    {
        $pdo = self::getPDO();

        $stmt = $pdo->query(
            'SELECT comments.id, comments.text, comments.date, users.email
             FROM comments
             JOIN users ON comments.user_id = users.id
             ORDER BY comments.date DESC'
        );

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create(int $userId, string $text)
    {
        $pdo = self::getPDO();

        $stmt = $pdo->prepare(
            'INSERT INTO comments (user_id, text) VALUES (:user_id, :text)'
        );

        $stmt->execute([
            ':user_id' => $userId,
            ':text' => $text,
        ]);
    }
}