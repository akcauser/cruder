<?php

namespace Encodeurs\Cruder\Utils\TargetFile;


class TargetFileNameUtil
{
    public static function model($modelName)
    {
        return $modelName . ".php";
    }

    public static function factory($modelName)
    {
        return $modelName . "Factory.php";
    }

    public static function seeder($modelName)
    {
        return $modelName . "Seeder.php";
    }

    public static function serviceAbstract($modelName)
    {
        return "I" . $modelName . "Service.php";
    }

    public static function serviceConcrete($modelName)
    {
        return $modelName . "Service.php";
    }

    public static function dataServiceAbstract($modelName)
    {
        return "I" . $modelName . "DataService.php";
    }

    public static function dataServiceConcrete($modelName)
    {
        return $modelName . "DataService.php";
    }

    public static function apiController($modelName)
    {
        return "API" . $modelName . "Controller.php";
    }

    public static function cmsController($modelName)
    {
        return "CMS" . $modelName . "Controller.php";
    }

    public static function storeRequest($modelName)
    {
        return $modelName . "StoreRequest.php";
    }

    public static function updateRequest($modelName)
    {
        return $modelName . "UpdateRequest.php";
    }

    public static function schema($modelName)
    {
        return $modelName . ".json";
    }

    public static function apiTest($modelName)
    {
        return "API" . $modelName . "Test.php";
    }
}
