<?php

namespace Akcauser\Cruder\Generator\Request;

use Akcauser\Cruder\Generator\Abstract\Generator;


class StoreRequestGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = "App/Http/Requests/";
        $this->targetFile = $modelName . "StoreRequest.php";
        $this->fileChangeType = "new";
        $this->templatePath = __DIR__ . '/../../templates/requests/store_request.stub';
        $this->generate();
    }
}
