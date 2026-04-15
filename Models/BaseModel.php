<?php

namespace guestbook\Models;

use PDO;

abstract class BaseModel
{
    protected static function getPDO(): PDO
    {
        $config = require __DIR__ . '/../config.php';

        return Database::getInstance($config)->getConnection();
    }
}