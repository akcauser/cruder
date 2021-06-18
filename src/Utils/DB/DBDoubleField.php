<?php

namespace Encodeurs\Cruder\Utils\DB;


class DBDoubleField
{
    private static $template = '$table->double("½FIELD_NAME½")%NULLABLE%;';

    public static function create($fieldName)
    {
        return str_replace("½FIELD_NAME½", $fieldName, self::$template);
    }
}
