<?php

namespace App\Models;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

abstract class BaseModel
{
    protected static string $table = '';

    protected static function table(): Builder
    {
        return DB::table(static::$table);
    }
}