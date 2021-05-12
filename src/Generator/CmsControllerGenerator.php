<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FileUtil;


class CmsControllerGenerator
{
    private $modelName;
    private $template;
    private $folderPath;
    private $prefix;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->folderPath = config('cruder.controllers_path.cms');
        $this->prefix = config('cruder.prefix.cms');

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
        $this->template = file_get_contents(__DIR__ . '/../templates/controller/cms_controller.stub');
    }

    protected function replaceVariables()
    {
        # set variables in templates
    }

    protected function store()
    {
        $fileName = $this->prefix . $this->modelName . 'Controller.php';

        FileUtil::newFile($this->folderPath, $fileName, $this->template);
    }
}
