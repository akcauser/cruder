<?php

namespace Akcauser\Cruder\Utils;

use Akcauser\Cruder\Utils\DB\DBIntegerField;
use Akcauser\Cruder\Utils\DB\DBStringField;
use Akcauser\Cruder\Utils\DB\DBTextField;
use Akcauser\Cruder\Utils\Factory\FactoryIntegerField;
use Akcauser\Cruder\Utils\Factory\FactoryStringField;
use Akcauser\Cruder\Utils\Factory\FactoryTextField;

class FieldUtil
{
    public static $dbtypes = [
        "string",
        "text",
        "integer",
    ];

    public static $htmltypes = [
        "text",
        "number",
        "textarea",
    ];

    public static function generateDBField($field)
    {
        switch ($field["dbtype"]) {
            case 'string':
                return DBStringField::create($field["name"]);
                break;
            case 'integer':
                return DBIntegerField::create($field["name"]);
                break;
            case 'text':
                return DBTextField::create($field["name"]);
                break;
        }
    }

    public static function generateFactoryField($field)
    {
        switch ($field["dbtype"]) {
            case 'string':
                return FactoryStringField::create($field["name"]);
                break;
            case 'integer':
                return FactoryIntegerField::create($field["name"]);
                break;
            case 'text':
                return FactoryTextField::create($field["name"]);
                break;
        }
    }

    public static function generateHTMLField($field)
    {
        # code...
    }
}
