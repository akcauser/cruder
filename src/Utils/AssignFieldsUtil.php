<?php

namespace Encodeurs\Cruder\Utils;

class AssignFieldsUtil
{
    public static function defaultGenerate($field)
    {
        if ($field["nullable"])
            return '$%MODEL_NAME_CAMEL_CASE%->' . $field['name'] . ' = $data["' . $field['name'] . '"] ?? null;' . "\n\t\t";

        return '$%MODEL_NAME_CAMEL_CASE%->' . $field['name'] . ' = $data["' . $field['name'] . '"];' . "\n\t\t";
    }

    public static function imageBase64($field)
    {
        if ($field["nullable"])
            return '$%MODEL_NAME_CAMEL_CASE%->' . $field['name'] . ' = $data["' . $field['name'] . 'Base64"];' . "\n\t\t";

        return '$%MODEL_NAME_CAMEL_CASE%->' . $field['name'] . ' = $data["' . $field['name'] . 'Base64"];' . "\n\t\t";
    }
}
