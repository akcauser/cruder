<?php

namespace Encodeurs\Cruder\Utils;

use Illuminate\Support\Str;

class ModelUtil
{


    public static function generateRelationFunction($relationField)
    {
        $template = "";
        if ($relationField["relationType"] == "1tm" or $relationField["relationType"] == "1t1")
            $template = FileUtil::getContent(__DIR__ . '/../templates/models/1tm_relation_function.stub');

        $template = str_replace("%RELATION_MODEL_CAMEL_CASE%", StringUtil::camelCase($relationField["foreignModel"]), $template);
        $template = str_replace("%RELATION_MODEL%", $relationField["foreignModel"], $template);
        $template = str_replace("%FOREIGN_KEY%", $relationField["fieldName"], $template);
        $template = str_replace("%OWNER_KEY%", $relationField["foreignField"], $template);

        return $template;
    }
}
