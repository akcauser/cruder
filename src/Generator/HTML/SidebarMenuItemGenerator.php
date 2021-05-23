<?php

namespace Encodeurs\Cruder\Generator\HTML;

use Encodeurs\Cruder\Utils\FileUtil;
use Illuminate\Support\Str;

class SidebarMenuItemGenerator
{
    private $modelName;
    private $template;
    private $folderPath = 'resources/views/cms/layouts/';
    private $fileName = 'menu.blade.php';

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->fileChangeType = "put";
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
        $this->template = file_get_contents(__DIR__ . '/../../templates/views/layouts/menu_item.stub');
    }

    protected function replaceVariables()
    {
        $this->template = str_replace('%MODEL_NAME%', $this->modelName, $this->template);
        $this->template = str_replace('%MODEL_NAME_SNAKE_CASE%', Str::snake($this->modelName . 's'), $this->template);
    }

    protected function store()
    {
        FileUtil::putContent($this->folderPath . $this->fileName, $this->template);
    }
}
