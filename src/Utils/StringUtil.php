<?php

namespace Encodeurs\Cruder\Utils;

use Illuminate\Support\Str;

class StringUtil
{
    public static function camelCase($string)
    {
        return Str::camel($string);
    }
}
