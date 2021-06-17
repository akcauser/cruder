<?php

namespace Encodeurs\Cruder\Utils;

use Encodeurs\Cruder\Utils\DB\DBIntegerField;
use Encodeurs\Cruder\Utils\DB\DBRelationField;
use Encodeurs\Cruder\Utils\DB\DBSmallIntegerField;
use Encodeurs\Cruder\Utils\DB\DBStringField;
use Encodeurs\Cruder\Utils\DB\DBTextField;
use Encodeurs\Cruder\Utils\Factory\FactoryIntegerField;
use Encodeurs\Cruder\Utils\Factory\FactorySmallIntegerField;
use Encodeurs\Cruder\Utils\Factory\FactoryStringField;
use Encodeurs\Cruder\Utils\Factory\FactoryTextField;

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
        }
    }

    public static function generateHTMLField($field)
    {
        $htmlField = "";
        switch ($field["htmltype"]) {
            case 'text':
                $htmlField = __DIR__ . '/../templates/views/html_fields/text.stub';
                break;
            case 'number':
                $htmlField = __DIR__ . '/../templates/views/html_fields/number.stub';
                break;
            case 'textarea':
                $htmlField = __DIR__ . '/../templates/views/html_fields/textarea.stub';
                break;
            default:
                return false;
        }
        $fieldContent = FileUtil::getContentByPath($htmlField);
        $fieldContent = str_replace('%FIELD_NAME%', $field["name"], $fieldContent);
        if ($field["nullable"]) {
            $fieldContent = str_replace("%REQUIRED%", "", $fieldContent);
        } else {
            $fieldContent = str_replace("%REQUIRED%", "required", $fieldContent);
        }
        return $fieldContent;
    }

    public static function generateHTMLRelationField($relationField)
    {
        $fieldContent = FileUtil::getContentByPath(__DIR__ . '/../templates/views/html_fields/1tm_relation.stub');
        $fieldContent = str_replace('%FIELD_NAME%', $relationField["fieldName"], $fieldContent);
        $fieldContent = str_replace('%FOREIGN_MODEL%', $relationField["foreignModel"], $fieldContent);
        $fieldContent = str_replace('%FOREIGN_MODEL_CAMEL_CASE%', StringUtil::camelCase($relationField["foreignModel"]), $fieldContent);
        $fieldContent = str_replace('%FIELD_NAME%', $relationField["fieldName"], $fieldContent);
        $fieldContent = str_replace('%FOREIGN_SHOW_FIELD%', $relationField["foreignShowField"], $fieldContent);

        return $fieldContent;
    }

    public static function generateJsonSchemaField($field)
    {
        $path = __DIR__ . '/../templates/schema/json_field.stub';
        $jsonField = FileUtil::getContentByPath($path);

        $jsonField = str_replace("%NAME%", $field["name"], $jsonField);
        $jsonField = str_replace("%DB_TYPE%", $field["dbtype"], $jsonField);
        $jsonField = str_replace("%HTML_TYPE%", $field["htmltype"], $jsonField);
        $jsonField = str_replace("%VALIDATIONS%", $field["validations"], $jsonField);
        $jsonField = str_replace("%NULLABLE%", $field["nullable"] ? "true" : "false", $jsonField);
        $jsonField = str_replace("%SEARCHABLE%", $field["searchable"] ? "true" : "false", $jsonField);
        $jsonField = str_replace("%IN_INDEX%", $field["inIndex"] ? "true" : "false", $jsonField);
        $jsonField = str_replace("%FILLABLE%", $field["fillable"] ? "true" : "false", $jsonField);

        return $jsonField;
    }

    public static function generateJsonSchemaRelationField($field)
    {
        $path = __DIR__ . '/../templates/schema/json_relation_field.stub';
        $jsonField = FileUtil::getContentByPath($path);

        $jsonField = str_replace("%FIELD_NAME%", $field["fieldName"], $jsonField);
        $jsonField = str_replace("%FOREIGN_FIELD%", $field["foreignField"], $jsonField);
        $jsonField = str_replace("%FOREIGN_MODEL%", $field["foreignModel"], $jsonField);
        $jsonField = str_replace("%FOREIGN_SHOW_FIELD%", $field["foreignShowField"], $jsonField);
        $jsonField = str_replace("%FOREIGN_TABLE%", $field["foreignTable"], $jsonField);
        $jsonField = str_replace("%RELATION_TYPE%", $field["relationType"], $jsonField);

        return $jsonField;
    }

    public static function addDefaultValidations($requestFields)
    {
        $fields = [];
        foreach ($requestFields as $field) {
            if ($field['dbtype'] == "smallInteger") {
                // check integer and, min, max
                // add integer, min, max validation
                $field["validations"] = self::addValidationIfNotExist($field["validations"], "integer", "integer");
                $field["validations"] = self::addValidationIfNotExist($field["validations"], "min:-32768", "min");
                $field["validations"] = self::addValidationIfNotExist($field["validations"], "max:32768", "max");
            }

            array_push($fields, $field);
        }

        return $fields;
        // DB Field Validation add to validation as default
        // integer -> integer
        // smallInteger -> integer, max, min
        // bigInteger -> integer
    }

    private static function addValidationIfNotExist($validations, $validation, $check)
    {
        if (!str_contains($validations, $check)) {
            $validations = self::addPipe($validations);
            $validations .= $validation;
        }

        return $validations;
    }

    private static function addPipe($validations)
    {
        if ($validations != "")
            $validations .= "|";

        return $validations;
    }
}
