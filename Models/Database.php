<?php

namespace guestbook\Models;

use PDO;
use PDOException;

class Database
{
    private static $instance = null;

    private $pdo;

    private function __construct(array $config)
    {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8mb4',
            $config['host'],
            $config['name']
        );

        try {
            $this->pdo = new PDO($dsn, $config['user'], $config['pass'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            die('DB error: ' . $e->getMessage());
        }
    }

    public static function getInstance(array $config): self
    {
        if (self::$instance === null) {
            self::$instance = new self($config);
        }

        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}