<?php

namespace Encodeurs\Cruder\Utils;

class SwaggerUtil
{
    private static $templatePath = __DIR__ . '/../templates/swagger/property.stub';
    public static function generateProperty($field)
    {
        // get property template
        $template = FileUtil::getContent(self::$templatePath);
        // replace fields
        $template = str_replace('%FIELD_NAME%', $field["name"], $template);
        // type generate and replace
        $template = str_replace('%TYPE%', self::generateType($field), $template);
        // format generate and replace
        $template = str_replace('%FORMAT%', self::generateFormat($field), $template);

        return $template;
    }

    public static function generateRelationField($relationField)
    {
        // get property template
        $template = FileUtil::getContent(self::$templatePath);
        // replace fields
        $template = str_replace('%FIELD_NAME%', $relationField["fieldName"], $template);
        // type generate and replace
        $template = str_replace('%TYPE%', "integer", $template);
        // format generate and replace
        $template = str_replace('%FORMAT%', "", $template);

        return $template;
    }

    /** 
     * String field default olarak kabul edildi. Bu yüzden string için olan durumlar eklenmedi. 
     */
    private static function generateType($field)
    {
        $type = "";
        switch ($field["dbtype"]) {
            case 'integer':
                $type = "integer";
                break;
            case 'smallInteger':
                $type = "integer";
                break;
            case 'bigInteger':
                $type = "integer";
                break;
            case 'double':
                $type = "number";
                break;
            case 'float':
                $type = "number";
                break;
            case 'decimal':
                $type = "number";
                break;
            case 'boolean':
                $type = "boolean";
                break;
            default:
                $type = "string";
                break;
        }
        return $type;
    }

    private static function generateFormat($field)
    {
        $format = "";
        switch ($field["dbtype"]) {
            case 'double':
                $format = "double";
                break;
            case 'float':
                $format = "float";
                break;
            case 'decimal':
                $format = "float";
                break;
            case 'binary':
                $format = "binary";
                break;
            case 'dateTime':
                $format = "date-time";
                break;
            case 'date':
                $format = "date";
                break;
            case 'timestamp':
                $format = "date";
                break;
        }
        return $format;
    }
}
