<?php

namespace Encodeurs\Cruder\Generator\HTML;

use Encodeurs\Cruder\Generator\Abstract\Generator;

class EditPageGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->fileChangeType = "new";
        $this->targetFolder = "resources/views/cms/" . $this->convertPlural($this->getModelNameSnakeCase()) . "/";
        $this->targetFile = "edit.blade.php";
        $this->templatePath = __DIR__ . '/../../templates/views/pages/edit.stub';
        $this->generate();
    }
}
