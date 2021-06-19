<?php

namespace Encodeurs\Cruder\Utils;

class AssignFieldsUtil
{
    public static function defaultGenerate($field)
    {
        return '$%MODEL_NAME_CAMEL_CASE%->' . $field['name'] . ' = $data["' . $field['name'] . '"];' . "\n\t\t";
    }

    public static function imageBase64($field)
    {
        return '$%MODEL_NAME_CAMEL_CASE%->' . $field['name'] . ' = $data["' . $field['name'] . 'Base64"];' . "\n\t\t";
    }
}
