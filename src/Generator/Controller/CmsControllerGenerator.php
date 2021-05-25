<?php

namespace Encodeurs\Cruder\Generator\Controller;

use Encodeurs\Cruder\Generator\Abstract\Generator;

class CmsControllerGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.controller') . config('cruder.cms_prefix') . "/";;
        $this->templatePath = __DIR__ . '/../../templates/controller/cms_controller.stub';
        $this->targetFile = config('cruder.cms_prefix') . $this->modelName . 'Controller.php';
        $this->fileChangeType = "new";

        parent::__construct();
    }
}
