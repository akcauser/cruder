<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FileUtil;
use Facade\FlareClient\Stacktrace\File;

class ApiRouteGenerator
{
    private $modelName;
    private $template;
    private $folderPath;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->folderPath = config('cruder.routes_path.api');

        $this->generate();
    }

    protected function generate()
    {
        $this->getTemplate();
        $this->replaceVariables();
        $this->store();
    }

    protected function getTemplate()
    {
        $this->template = file_get_contents(__DIR__ . '/../templates/routes/api_routes.stub');
    }

    protected function replaceVariables()
    {
        # set variables in templates
    }

    protected function store()
    {
        FileUtil::putContent($this->folderPath, $this->template);
    }
}
