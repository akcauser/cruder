<?php

namespace Akcauser\Cruder\Utils\DB;


class TextField
{
    private static $template = '$table->text("½FIELD_NAME½");';

    public static function create($fieldName)
    {
        return str_replace("½FIELD_NAME½", $fieldName, self::$template);
    }
}
