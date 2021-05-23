<?php

namespace Encodeurs\Cruder\Utils;

use Illuminate\Support\Str;

class DatabaseUtil
{
    public static function generateTableName($modelName)
    {
        return Str::snake($modelName) . 's';
    }

    public static function generateIndexFields($fields)
    {
        $indexExist = false;
        $indexFieldContent = '$table->index([';
        foreach ($fields as $field) {
            if ($field["inIndex"]) {
                $indexExist = true;
                $indexFieldContent .= "'{$field['name']}',";
            }
        }
        $indexFieldContent .= ']);';

        if (!$indexExist)
            return "";

        return $indexFieldContent;
    }
}
