<?php

namespace Encodeurs\Cruder\Utils\Factory;


class FactoryStringField
{
    private static $template = '"½FIELD_NAME½" => $this->faker->text(),';

    public static function create($fieldName)
    {
        return str_replace("½FIELD_NAME½", $fieldName, self::$template);
    }
}
