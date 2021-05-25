<?php

namespace Encodeurs\Cruder\Generator\DataService;

use Encodeurs\Cruder\Generator\Abstract\Generator;

class DataServiceAbstractGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.data_service') . "Abstract/";
        $this->targetFile = 'I' . $this->modelName . 'DataService.php';
        $this->fileChangeType = "new";
        $this->templatePath = __DIR__ . '/../../templates/services/dataservice_abstract.stub';

        parent::__construct();
    }
}
