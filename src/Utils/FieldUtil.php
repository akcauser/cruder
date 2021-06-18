<?php

namespace Encodeurs\Cruder\Utils;

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

            if ($field['dbtype'] == "bigInteger") {
                $field["validations"] = self::addValidationIfNotExist($field["validations"], "integer", "integer");
            }

            if ($field['dbtype'] == "dateTime") {
                $field["validations"] = self::addValidationIfNotExist($field["validations"], "date", "date");
            }

            if ($field['dbtype'] == "text") {
                $field["validations"] = self::addValidationIfNotExist($field["validations"], "string", "string");
            }

            if ($field['dbtype'] == "longText") {
                $field["validations"] = self::addValidationIfNotExist($field["validations"], "string", "string");
            }

            if ($field['dbtype'] == "boolean") {
                $field["validations"] = self::addValidationIfNotExist($field["validations"], "boolean", "boolean");
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
