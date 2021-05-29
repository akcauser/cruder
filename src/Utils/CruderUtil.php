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
}
