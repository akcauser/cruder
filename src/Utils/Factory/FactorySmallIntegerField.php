<?php

namespace Encodeurs\Cruder\Utils\Factory;


class FactorySmallIntegerField
{
    private static $template = '"½FIELD_NAME½" => random_int(-32768, 32768),';

    public static function create($fieldName)
    {
        return str_replace("½FIELD_NAME½", $fieldName, self::$template);
    }
}
