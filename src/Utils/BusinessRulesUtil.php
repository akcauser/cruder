<?php

namespace Encodeurs\Cruder\Utils;

use Encodeurs\Cruder\Utils\FileUtil;

class BusinessRulesUtil
{
    private static $imageBase64Template = __DIR__ . '/../templates/services/fields/image_base64.stub';

    public static function imageGenerate($field)
    {
        $template = FileUtil::getContent(self::$imageBase64Template);
        $template = str_replace("%FIELD_NAME%", $field['name'], $template);
        return $template;
    }
}
