<?php

namespace Encodeurs\Cruder\Generator\Service;

use Encodeurs\Cruder\Generator\Abstract\Generator;

class ServiceConcreteGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.service') . "Concrete/";
        $this->targetFile = $this->modelName . 'Service.php';
        $this->fileChangeType = "new";
        $this->templatePath = __DIR__ . '/../../templates/services/service_concrete.stub';

        parent::__construct();
    }
}
