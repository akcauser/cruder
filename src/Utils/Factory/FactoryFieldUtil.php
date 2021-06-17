<?php

namespace Encodeurs\Cruder\Utils\Factory;

use Encodeurs\Cruder\Utils\Factory\FactoryIntegerField;
use Encodeurs\Cruder\Utils\Factory\FactorySmallIntegerField;
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
            case 'text':
                return FactoryTextField::create($field["name"]);
                break;
            case 'dateTime':
                return FactoryDateTimeField::create($field["name"]);
                break;
        }
    }
}
