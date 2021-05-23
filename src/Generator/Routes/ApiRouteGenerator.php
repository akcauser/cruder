<?php

namespace Encodeurs\Cruder\Generator\Routes;

use Encodeurs\Cruder\Generator\Abstract\Generator;

class ApiRouteGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.routes.folder');
        $this->targetFile = config('cruder.routes.api_file');
        $this->templatePath = __DIR__ . '/../../templates/routes/api_routes.stub';
        $this->fileChangeType = "put";
        $this->generate();
    }
}
