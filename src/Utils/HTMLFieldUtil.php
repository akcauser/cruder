<?php

namespace Encodeurs\Cruder\Utils;

class HTMLFieldUtil
{
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
            case 'email':
                $htmlField = __DIR__ . '/../templates/views/html_fields/email.stub';
                break;
            case 'password':
                $htmlField = __DIR__ . '/../templates/views/html_fields/password.stub';
                break;
            case 'color':
                $htmlField = __DIR__ . '/../templates/views/html_fields/color.stub';
                break;
            case 'textarea':
                $htmlField = __DIR__ . '/../templates/views/html_fields/textarea.stub';
                break;
            case 'datetime-local':
                $htmlField = __DIR__ . '/../templates/views/html_fields/datetime-local.stub';
                break;
            case 'date':
                $htmlField = __DIR__ . '/../templates/views/html_fields/date.stub';
                break;
            case 'boolean':
                $htmlField = __DIR__ . '/../templates/views/html_fields/boolean.stub';
                break;
            case 'float':
                $htmlField = __DIR__ . '/../templates/views/html_fields/float.stub';
                break;
            case 'image':
                $htmlField = __DIR__ . '/../templates/views/html_fields/image.stub';
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
}
