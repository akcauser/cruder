<?php

namespace Encodeurs\Cruder\Utils;

use Illuminate\Support\Str;

class StringUtil
{
    public static function camelCase($string)
    {
        return Str::camel($string);
    }

    public static function snakeCase($string)
    {
        return Str::snake($string);
    }

    public static function convertPlural($string)
    {
        return $string . "s";
    }

    public static function titleCase($string)
    {
        return Str::title($string);
    }

    public static function clearSpace($string)
    {
        return str_replace(" ", "", $string);
    }
}
