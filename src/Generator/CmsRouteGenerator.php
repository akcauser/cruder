<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FileUtil;
use Illuminate\Support\Str;

class CmsRouteGenerator
{
    private $modelName;
    private $template;
    private $folderPath;
    private $fileName;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->folderPath = config('cruder.routes.folder');
        $this->fileName = config('cruder.routes.cms_file');

        // if cms.php doesnt exist, add cms.php file and init template
        $content = FileUtil::getContent($this->folderPath . $this->fileName);
        if (!$content) {
            $emptyTemplate = file_get_contents(__DIR__ . '/../templates/routes/cms_initialize.stub');
            FileUtil::newFile($this->folderPath, $this->fileName, $emptyTemplate);
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
        $this->template = file_get_contents(__DIR__ . '/../templates/routes/cms_routes.stub');
    }

    protected function replaceVariables()
    {
        $this->template = str_replace('%MODEL_NAME%', $this->modelName, $this->template);
        $this->template = str_replace('%MODEL_NAME_SNAKE%', Str::snake($this->modelName, "_"), $this->template);
    }

    protected function store()
    {
        FileUtil::putContent($this->folderPath . $this->fileName, $this->template);
    }
}
