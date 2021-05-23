<?php

namespace Encodeurs\Cruder\Generator\HTML;

use Encodeurs\Cruder\Generator\Abstract\Generator;

class IndexPageGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->fileChangeType = "new";
        $this->targetFolder = "resources/views/cms/" . $this->convertPlural($this->getModelNameSnakeCase()) . "/";
        $this->targetFile = "index.blade.php";
        $this->templatePath = __DIR__ . '/../../templates/views/pages/index.stub';
        $this->generate();
    }
}
