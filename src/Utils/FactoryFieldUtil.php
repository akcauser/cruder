<?php

namespace Encodeurs\Cruder\Utils;

use Encodeurs\Cruder\Utils\Factory\FactoryIntegerField;
use Encodeurs\Cruder\Utils\Factory\FactorySmallIntegerField;
use Encodeurs\Cruder\Utils\Factory\FactoryBigIntegerField;
use Encodeurs\Cruder\Utils\Factory\FactoryBooleanField;
use Encodeurs\Cruder\Utils\Factory\FactoryDateTimeField;
use Encodeurs\Cruder\Utils\Factory\FactoryDoubleField;
use Encodeurs\Cruder\Utils\Factory\FactoryLongTextField;
use Encodeurs\Cruder\Utils\Factory\FactoryStringField;
use Encodeurs\Cruder\Utils\Factory\FactoryTextField;

class FactoryFieldUtil
{
    public static function generateFactoryField($field)
    {
        switch ($field["dbtype"]) {
            case 'string':
                return FactoryStringField::create($field["name"]);
                break;
            case 'integer':
                return FactoryIntegerField::create($field["name"]);
                break;
            case 'smallInteger':
                return FactorySmallIntegerField::create($field["name"]);
                break;
            case 'bigInteger':
                return FactoryBigIntegerField::create($field["name"]);
                break;
            case 'double':
                return FactoryDoubleField::create($field["name"]);
                break;
            case 'text':
                return FactoryTextField::create($field["name"]);
                break;
            case 'longText':
                return FactoryLongTextField::create($field["name"]);
                break;
            case 'dateTime':
                return FactoryDateTimeField::create($field["name"]);
                break;
            case 'boolean':
                return FactoryBooleanField::create($field["name"]);
                break;
        }
    }
}
