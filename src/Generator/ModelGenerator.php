<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FileUtil;


class ModelGenerator
{
    private $modelName;
    private $template;
    private $folderPath;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->folderPath = config('cruder.models_path');

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
        $this->template = file_get_contents(__DIR__ . '/../templates/models/model.stub');
    }

    protected function replaceVariables()
    {
        # set variables in templates
    }

    protected function store()
    {
        $fileName = $this->modelName . '.php';

        FileUtil::newFile($this->folderPath, $fileName, $this->template);
    }
}
