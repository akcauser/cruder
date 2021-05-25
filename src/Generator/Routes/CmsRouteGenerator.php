<?php

namespace Encodeurs\Cruder\Generator\Routes;

use Encodeurs\Cruder\Generator\Abstract\Generator;

class CmsRouteGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.route');
        $this->targetFile = config('cruder.web_route');
        $this->templatePath = __DIR__ . '/../../templates/routes/cms_routes.stub';
        $this->fileChangeType = "put";

        parent::__construct();
    }
}
