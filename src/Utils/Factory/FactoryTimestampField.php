<?php

namespace Encodeurs\Cruder\Utils\Factory;


class FactoryTimestampField
{
    private static $template = '"½FIELD_NAME½" => $this->faker->dateTime(),';

    public static function create($fieldName)
    {
        return str_replace("½FIELD_NAME½", $fieldName, self::$template);
    }
}
