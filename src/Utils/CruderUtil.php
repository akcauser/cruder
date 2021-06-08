<?php

namespace Encodeurs\Cruder\Utils;

class CruderUtil
{
    public static function getAllCruder()
    {
        $cruders = [];
        $fileList = glob(resource_path('cruder_schemas/*')) ?? [];
        foreach ($fileList as $filename) {
            if (is_file($filename)) {
                array_push($cruders, json_decode(file_get_contents($filename)));
            }
        }

        return $cruders;
    }

    public static function getAllModels()
    {
        $models = [];
        $fileList = glob(app_path('models/*')) ?? [];
        foreach ($fileList as $filename) {
            if (is_file($filename)) {
                $strArray = explode("/", substr($filename, 0, -4));
                array_push($models, $strArray[count($strArray) - 1]);
            }
        }

        return $models;
    }
}
