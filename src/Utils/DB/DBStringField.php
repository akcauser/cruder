<?php

namespace Akcauser\Cruder\Utils\DB;


class DBStringField
{
    private static $template = '$table->string("½FIELD_NAME½")%NULLABLE%;';

    public static function create($fieldName)
    {
        return str_replace("½FIELD_NAME½", $fieldName, self::$template);
    }
}
