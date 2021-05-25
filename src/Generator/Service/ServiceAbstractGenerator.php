<?php

namespace Encodeurs\Cruder\Generator\Service;

use Encodeurs\Cruder\Generator\Abstract\Generator;

class ServiceAbstractGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.service') . "Abstract/";
        $this->targetFile = 'I' . $this->modelName . 'Service.php';
        $this->fileChangeType = "new";
        $this->templatePath = __DIR__ . '/../../templates/services/service_abstract.stub';

        parent::__construct();
    }
}
