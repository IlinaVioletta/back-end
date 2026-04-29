<?php

namespace App\Models;

class Comment extends BaseModel
{
    protected static string $table = 'comments';

    public static function getAll(): array
    {
        return static::table()
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.id', 'comments.text', 'comments.date', 'users.email')
            ->orderBy('comments.date', 'desc')
            ->get()
            ->map(function ($row) {
                return (array) $row;
            })
            ->toArray();
    }

    public static function create(int $userId, string $text): void
    {
        static::table()->insert([
            'user_id' => $userId,
            'text' => $text,
            'date' => now()->format('Y-m-d H:i:s'),
        ]);
    }
}