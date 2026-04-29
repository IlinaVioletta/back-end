<?php

namespace App\Models;

class User extends BaseModel
{
    protected static string $table = 'users';

    public static function findByEmailAndPassword(string $email, string $password)
    {
        return static::table()
            ->where('email', $email)
            ->where('password', $password)
            ->first();
    }

    public static function findByEmail(string $email)
    {
        return static::table()
            ->where('email', $email)
            ->first();
    }

    public static function create(string $email, string $password): void
    {
        static::table()->insert([
            'email'    => $email,
            'password' => $password,
        ]);
    }
}