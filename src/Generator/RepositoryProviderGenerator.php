<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FileUtil;


class RepositoryProviderGenerator
{
    private $modelName;
    private $template;
    private $folderPath;
    private $fileName;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->folderPath = config('cruder.repository_provider_path');
        $this->fileName = config('cruder.repository_provider_file');

        // get service provider file
        $content = FileUtil::getContent($this->folderPath . $this->fileName);
        if (!$content) {
            $emptyTemplate = file_get_contents(__DIR__ . '/../templates/providers/repository_service_provider.stub');
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
        $this->template = file_get_contents(__DIR__ . '/../templates/providers/register_method.stub');
    }

    protected function replaceVariables()
    {
        # set variables in templates
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
