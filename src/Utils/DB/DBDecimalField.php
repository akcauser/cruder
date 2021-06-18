<?php

namespace Encodeurs\Cruder\Utils\DB;


class DBDecimalField
{
    private static $template = '$table->decimal("½FIELD_NAME½")%NULLABLE%;';

    public static function create($fieldName)
    {
        return str_replace("½FIELD_NAME½", $fieldName, self::$template);
    }
}
