<?php

namespace Akcauser\Cruder\Generator\HTML;

use Akcauser\Cruder\Generator\Abstract\Generator;

class CreatePageGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->fileChangeType = "new";
        $this->targetFolder = "resources/views/cms/" . $this->convertPlural($this->getModelNameSnakeCase()) . "/";
        $this->targetFile = "create.blade.php";
        $this->templatePath = __DIR__ . '/../../templates/views/pages/create.stub';
        $this->generate();
    }
}
