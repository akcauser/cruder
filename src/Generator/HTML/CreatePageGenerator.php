<?php

namespace Encodeurs\Cruder\Generator\HTML;

use Encodeurs\Cruder\Generator\Abstract\Generator;

class CreatePageGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->fileChangeType = "new";
        $this->targetFolder = config('cruder.path.view') . "cms/" . $this->convertPlural($this->getModelNameSnakeCase()) . "/";
        $this->targetFile = "create.blade.php";
        $this->templatePath = __DIR__ . '/../../templates/views/pages/create.stub';

        parent::__construct();
    }
}
