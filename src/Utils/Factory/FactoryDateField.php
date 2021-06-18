<?php

namespace Encodeurs\Cruder\Utils\Factory;


class FactoryDateField
{
    private static $template = '"½FIELD_NAME½" => $this->faker->date(),';

    public static function create($fieldName)
    {
        return str_replace("½FIELD_NAME½", $fieldName, self::$template);
    }
}
