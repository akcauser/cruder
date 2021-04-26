<?php

namespace Akcauser\Cruder\Utils;

use Akcauser\Cruder\Utils\DB\IntegerField;
use Akcauser\Cruder\Utils\DB\StringField;
use Akcauser\Cruder\Utils\DB\TextField;

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
                return StringField::create($field["name"]);
                break;
            case 'integer':
                return IntegerField::create($field["name"]);
                break;
            case 'text':
                return TextField::create($field["name"]);
                break;
        }
    }

    public static function generateHTMLField($field)
    {
        # code...
    }
}
