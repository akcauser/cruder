<?php

namespace Encodeurs\Cruder\Utils\DB;


class DBRelationField
{
    private static $template = '$table->foreignId("%FIELD_NAME%")->references("%FOREIGN_FIELD%")->on("%FOREIGN_TABLE%");';

    public static function create($relationField)
    {
        $code = self::$template;
        $code = str_replace("%FIELD_NAME%", $relationField["fieldName"], $code);
        $code = str_replace("%FOREIGN_FIELD%", $relationField["foreignField"], $code);
        $code = str_replace("%FOREIGN_TABLE%", $relationField["foreignTable"], $code);
        return $code;
    }
}
