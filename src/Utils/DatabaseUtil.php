<?php

namespace Akcauser\Cruder\Utils;

use Illuminate\Support\Str;

class DatabaseUtil
{
    public static function generateTableName($modelName)
    {
        return Str::snake($modelName) . 's';
    }
}
