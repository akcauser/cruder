<?php

namespace Encodeurs\Cruder\Generator;

use Encodeurs\Cruder\Utils\FileUtil;

class ServiceAbstractGenerator
{
    private $modelName;
    private $template;
    private $folderPath;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->folderPath = config('cruder.service_paths.abstract');

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
        $this->template = file_get_contents(__DIR__ . '/../templates/services/service_abstract.stub');
    }

    protected function replaceVariables()
    {
        $this->template = str_replace('%MODEL_NAME%', $this->modelName, $this->template);
    }

    protected function store()
    {
        $fileName = 'I' . $this->modelName . 'Service.php';

        FileUtil::newFile($this->folderPath, $fileName, $this->template);
    }
}
