<?php

namespace Akcauser\Cruder\Generator\Controller;

use Akcauser\Cruder\Generator\Abstract\Generator;

class CmsControllerGenerator extends Generator
{
    private $prefix;

    public function __construct($modelName)
    {
        $this->prefix = "CMS";
        $this->modelName = $modelName;
        $this->targetFolder = "app/Http/Controllers/$this->prefix/";
        $this->templatePath = __DIR__ . '/../../templates/controller/cms_controller.stub';
        $this->targetFile = $this->prefix . $this->modelName . 'Controller.php';
        $this->fileChangeType = "new";

        $this->generate();
    }
}
