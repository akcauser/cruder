<?php

namespace Encodeurs\Cruder\Generator\Main;

use Encodeurs\Cruder\Generator\HTML\SidebarMenuItemGenerator;
use Encodeurs\Cruder\Utils\FileUtil;
use Encodeurs\Cruder\Utils\TargetFile\TargetFileUtil;
use Illuminate\Support\Facades\Artisan;

class Rollback
{
    private $modelName;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
    }

    public function call()
    {
        try {
            // Model 
            FileUtil::deleteFile(TargetFileUtil::model($this->modelName));

            // Factory
            FileUtil::deleteFile(TargetFileUtil::factory($this->modelName));

            // Seeder
            FileUtil::deleteFile(TargetFileUtil::seeder($this->modelName));

            // Api Controller
            FileUtil::deleteFile(TargetFileUtil::apiController($this->modelName));

            // Web Controller
            FileUtil::deleteFile(TargetFileUtil::cmsController($this->modelName));

            // Service
            FileUtil::deleteFile(TargetFileUtil::serviceAbstract($this->modelName));
            FileUtil::deleteFile(TargetFileUtil::serviceConcrete($this->modelName));

            // DataService
            FileUtil::deleteFile(TargetFileUtil::dataServiceAbstract($this->modelName));
            FileUtil::deleteFile(TargetFileUtil::dataServiceConcrete($this->modelName));

            // Test
            FileUtil::deleteFile(TargetFileUtil::apiTest($this->modelName));

            // Request 
            FileUtil::deleteFile(TargetFileUtil::storeRequest($this->modelName));
            FileUtil::deleteFile(TargetFileUtil::updateRequest($this->modelName));

            // Schema
            FileUtil::deleteFile(TargetFileUtil::schema($this->modelName));

            // rollback menu item
            $sidebarMenuItemGenerator = new SidebarMenuItemGenerator($this->modelName);
            $sidebarMenuItemGenerator->rollback();

            // todo: rollback views
            // todo: rollback api routes
            // todo: rollback providers
            // todo: rollback migration

            Artisan::call('l5-swagger:generate');

            return true;
        } catch (\Throwable $th) {
            throw $th;
            return false;;
        }
    }
}
