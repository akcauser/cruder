<?php

namespace Akcauser\Cruder\Utils\DB;


class IntegerField
{
    private static $template = '$table->integer("½FIELD_NAME½");';

    public static function create($fieldName)
    {
        return str_replace("½FIELD_NAME½", $fieldName, self::$template);
    }
}
