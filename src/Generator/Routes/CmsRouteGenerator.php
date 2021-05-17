<?php

namespace Akcauser\Cruder\Generator\Routes;

use Akcauser\Cruder\Generator\Abstract\Generator;

class CmsRouteGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.routes.folder');
        $this->targetFile = config('cruder.routes.cms_file');
        $this->templatePath = __DIR__ . '/../../templates/routes/cms_routes.stub';
        $this->fileChangeType = "put";
        $this->generate();
    }
}
