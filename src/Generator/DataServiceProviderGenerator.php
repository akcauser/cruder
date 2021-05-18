<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FileUtil;


class DataServiceProviderGenerator
{
    private $modelName;
    private $template;
    private $folderPath;
    private $fileName;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->folderPath = config('cruder.providers_path');
        $this->fileName = "DataServiceProvider.php";

        // get service provider file
        $content = FileUtil::getContent($this->folderPath . $this->fileName);
        if (!$content) {
            $emptyTemplate = file_get_contents(__DIR__ . '/../templates/providers/data_service_provider.stub');
            // if not exist create with template
            FileUtil::newFile($this->folderPath, $this->fileName, $emptyTemplate);
            // register app.php providers
        }

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
        $this->template = file_get_contents(__DIR__ . '/../templates/providers/dataservice_singleton.stub');
    }

    protected function replaceVariables()
    {
        $this->template = str_replace('%MODEL_NAME%', $this->modelName, $this->template);
    }

    protected function store()
    {
        $content = FileUtil::getContent($this->folderPath . $this->fileName);

        $search = "#repository-injection-part";
        $this->template = $search . "\n" . $this->template;

        $content = str_replace($search, $this->template, $content);

        FileUtil::newFile($this->folderPath, $this->fileName, $content);
    }
}
