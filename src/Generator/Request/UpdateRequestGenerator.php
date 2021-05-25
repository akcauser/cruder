<?php

namespace Encodeurs\Cruder\Generator\Request;

use Encodeurs\Cruder\Generator\Abstract\Generator;


class UpdateRequestGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config("cruder.path.request");
        $this->targetFile = $modelName . "UpdateRequest.php";
        $this->fileChangeType = "new";
        $this->templatePath = __DIR__ . '/../../templates/requests/update_request.stub';

        parent::__construct();
    }
}
