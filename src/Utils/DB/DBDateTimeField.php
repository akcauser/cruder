<?php

namespace Encodeurs\Cruder\Utils\DB;


class DBDateTimeField
{
    private static $template = '$table->dateTime("½FIELD_NAME½")%NULLABLE%;';

    public static function create($fieldName)
    {
        return str_replace("½FIELD_NAME½", $fieldName, self::$template);
    }
}
