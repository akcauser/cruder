<?php

namespace Encodeurs\Cruder\Utils\Factory;


class FactoryRelationField
{
    private static $template = '"%FIELD_NAME%" => \App\Models\%FOREIGN_MODEL%::factory(),';

    public static function create($relationField)
    {
        $code = self::$template;
        $code = str_replace("%FIELD_NAME%", $relationField["fieldName"], $code);
        $code = str_replace("%FOREIGN_MODEL%", $relationField["foreignModel"], $code);
        return $code;
    }
}
