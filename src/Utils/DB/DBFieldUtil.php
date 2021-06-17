<?php

namespace Encodeurs\Cruder\Utils\DB;

use Encodeurs\Cruder\Utils\DB\DBDateTimeField;
use Encodeurs\Cruder\Utils\DB\DBIntegerField;
use Encodeurs\Cruder\Utils\DB\DBSmallIntegerField;
use Encodeurs\Cruder\Utils\DB\DBStringField;
use Encodeurs\Cruder\Utils\DB\DBTextField;

class DBFieldUtil
{
    public static function generateDBField($field)
    {
        $dbField = "";
        switch ($field["dbtype"]) {
            case 'string':
                $dbField = DBStringField::create($field["name"]);
                break;
            case 'integer':
                $dbField = DBIntegerField::create($field["name"]);
                break;
            case 'smallInteger':
                $dbField = DBSmallIntegerField::create($field["name"]);
                break;
            case 'text':
                $dbField = DBTextField::create($field["name"]);
                break;
            case 'dateTime':
                $dbField = DBDateTimeField::create($field["name"]);
                break;
            default:
                return false;
        }

        if ($field["nullable"]) {
            $dbField = str_replace("%NULLABLE%", "->nullable()", $dbField);
        } else {
            $dbField = str_replace("%NULLABLE%", "", $dbField);
        }
        return $dbField;
    }
}
