<?php

namespace Encodeurs\Cruder\Generator\Request;

use Encodeurs\Cruder\Generator\Abstract\Generator;


class StoreRequestGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config("cruder.path.request");
        $this->targetFile = $modelName . "StoreRequest.php";
        $this->fileChangeType = "new";
        $this->templatePath = __DIR__ . '/../../templates/requests/store_request.stub';

        parent::__construct();
    }
}
