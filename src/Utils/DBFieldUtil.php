<?php

namespace Encodeurs\Cruder\Utils;

use Encodeurs\Cruder\Utils\DB\DBDateTimeField;
use Encodeurs\Cruder\Utils\DB\DBIntegerField;
use Encodeurs\Cruder\Utils\DB\DBSmallIntegerField;
use Encodeurs\Cruder\Utils\DB\DBBigIntegerField;
use Encodeurs\Cruder\Utils\DB\DBBinaryField;
use Encodeurs\Cruder\Utils\DB\DBBooleanField;
use Encodeurs\Cruder\Utils\DB\DBDateField;
use Encodeurs\Cruder\Utils\DB\DBDecimalField;
use Encodeurs\Cruder\Utils\DB\DBDoubleField;
use Encodeurs\Cruder\Utils\DB\DBFloatField;
use Encodeurs\Cruder\Utils\DB\DBStringField;
use Encodeurs\Cruder\Utils\DB\DBTextField;
use Encodeurs\Cruder\Utils\DB\DBLongTextField;
use Encodeurs\Cruder\Utils\DB\DBMediumTextField;
use Encodeurs\Cruder\Utils\DB\DBTimestampField;

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
            case 'bigInteger':
                $dbField = DBBigIntegerField::create($field["name"]);
                break;
            case 'double':
                $dbField = DBDoubleField::create($field["name"]);
                break;
            case 'text':
                $dbField = DBTextField::create($field["name"]);
                break;
            case 'longText':
                $dbField = DBLongTextField::create($field["name"]);
                break;
            case 'dateTime':
                $dbField = DBDateTimeField::create($field["name"]);
                break;
            case 'boolean':
                $dbField = DBBooleanField::create($field["name"]);
                break;
            case 'date':
                $dbField = DBDateField::create($field["name"]);
                break;
            case 'float':
                $dbField = DBFloatField::create($field["name"]);
                break;
            case 'decimal':
                $dbField = DBDecimalField::create($field["name"]);
                break;
            case 'mediumText':
                $dbField = DBMediumTextField::create($field["name"]);
                break;
            case 'binary':
                $dbField = DBBinaryField::create($field["name"]);
                break;
            case 'timestamp':
                $dbField = DBTimestampField::create($field["name"]);
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
