<?php

namespace Encodeurs\Cruder\Generator\Routes;

use Encodeurs\Cruder\Generator\Abstract\Generator;

class ApiRouteGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.route');
        $this->targetFile = config('cruder.api_route');
        $this->templatePath = __DIR__ . '/../../templates/routes/api_routes.stub';
        $this->fileChangeType = "put";

        parent::__construct();
    }
}
