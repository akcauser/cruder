<?php

namespace Encodeurs\Cruder\Generator\Controller;

use Encodeurs\Cruder\Generator\Abstract\Generator;


class ApiControllerGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.controller') . config('cruder.api_prefix') . "/";
        $this->templatePath = __DIR__ . '/../../templates/controller/api_controller.stub';
        $this->targetFile = config('cruder.api_prefix') . $this->modelName . 'Controller.php';
        $this->fileChangeType = "new";

        parent::__construct();
    }
}
