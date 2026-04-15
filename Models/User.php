<?php

namespace guestbook\Models;

use PDO;

class User extends BaseModel
{
    public static function findByEmailAndPassword($email, $password)
    {
        $pdo = self::getPDO();

        $stmt = $pdo->prepare(
            'SELECT id, email
             FROM users
             WHERE email = :email AND password = :password
             LIMIT 1'
        );

        $stmt->execute([
            ':email' => $email,
            ':password' => $password,
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public static function findByEmail($email)
    {
        $pdo = self::getPDO();

        $stmt = $pdo->prepare(
            'SELECT id
             FROM users
             WHERE email = :email
             LIMIT 1'
        );

        $stmt->execute([
            ':email' => $email,
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }

    public static function create($email, $password)
    {
        $pdo = self::getPDO();

        $stmt = $pdo->prepare(
            'INSERT INTO users (email, password) VALUES (:email, :password)'
        );

        $stmt->execute([
            ':email' => $email,
            ':password' => $password,
        ]);
    }
}