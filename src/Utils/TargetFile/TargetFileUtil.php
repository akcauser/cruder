<?php

namespace Encodeurs\Cruder\Utils\TargetFile;


class TargetFileUtil
{
    public static function model($modelName)
    {
        return config('cruder.path.model') . TargetFileNameUtil::model($modelName);
    }

    public static function factory($modelName)
    {
        return config('cruder.path.factory') . TargetFileNameUtil::factory($modelName);
    }

    public static function seeder($modelName)
    {
        return config('cruder.path.seeder') . TargetFileNameUtil::seeder($modelName);
    }

    public static function serviceAbstract($modelName)
    {
        return config('cruder.path.service') . "Abstract/" . TargetFileNameUtil::serviceAbstract($modelName);
    }

    public static function serviceConcrete($modelName)
    {
        return config('cruder.path.service') . "Concrete/" . TargetFileNameUtil::serviceConcrete($modelName);
    }

    public static function dataServiceAbstract($modelName)
    {
        return config('cruder.path.data_service') . "Abstract/" . TargetFileNameUtil::dataServiceAbstract($modelName);
    }

    public static function dataServiceConcrete($modelName)
    {
        return config('cruder.path.data_service') . "Concrete/" . TargetFileNameUtil::dataServiceConcrete($modelName);
    }

    public static function apiController($modelName)
    {
        return config('cruder.path.controller') . "API/" . TargetFileNameUtil::apiController($modelName);
    }

    public static function cmsController($modelName)
    {
        return config('cruder.path.controller') . "CMS/" . TargetFileNameUtil::cmsController($modelName);
    }

    public static function storeRequest($modelName)
    {
        return config('cruder.path.request') . TargetFileNameUtil::storeRequest($modelName);
    }

    public static function updateRequest($modelName)
    {
        return config('cruder.path.request') . TargetFileNameUtil::updateRequest($modelName);
    }

    public static function schema($modelName)
    {
        return config('cruder.path.schema') . TargetFileNameUtil::schema($modelName);
    }

    public static function apiTest($modelName)
    {
        return config('cruder.path.test') . TargetFileNameUtil::apiTest($modelName);
    }
}
