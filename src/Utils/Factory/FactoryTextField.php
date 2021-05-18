<?php

namespace Akcauser\Cruder\Utils\Factory;


class FactoryTextField
{
    private static $template = '"½FIELD_NAME½" => $this->faker->paragraph,';

    public static function create($fieldName)
    {
        return str_replace("½FIELD_NAME½", $fieldName, self::$template);
    }
}
