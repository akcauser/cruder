<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FileUtil;


class UpdateRequestGenerator
{
    private $modelName;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->folderPath = "App/Http/Requests/";
        $this->fileName = $modelName . "UpdateRequest.php";
        $this->generate();
    }

    protected function generate()
    {
        $this->getTemplate();;
        $this->replaceVariables();
        $this->store();
    }

    protected function getTemplate()
    {
        $this->template = file_get_contents(__DIR__ . '/../templates/requests/update_request.stub');
    }

    protected function replaceVariables()
    {
        $this->template = str_replace('%MODEL_NAME%', $this->modelName, $this->template);
    }

    protected function store()
    {
        FileUtil::newFile($this->folderPath, $this->fileName, $this->template);
    }
}
