<?php

namespace Encodeurs\Cruder\Utils\DB;


class DBTimestampField
{
    private static $template = '$table->timestamp("½FIELD_NAME½")%NULLABLE%;';

    public static function create($fieldName)
    {
        return str_replace("½FIELD_NAME½", $fieldName, self::$template);
    }
}
