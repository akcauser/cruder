<?php

namespace Akcauser\Cruder\Generator\Request;

use Akcauser\Cruder\Generator\Abstract\Generator;


class UpdateRequestGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config("requests_path");
        $this->targetFile = $modelName . "UpdateRequest.php";
        $this->fileChangeType = "new";
        $this->templatePath = __DIR__ . '/../../templates/requests/update_request.stub';
        $this->generate();
    }
}
