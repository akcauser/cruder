<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FileUtil;
use Illuminate\Support\Str;

class PagesGenerator
{
    private $modelName;
    private $indexTemplate;
    private $createTemplate;
    private $editTemplate;
    private $showTemplate;
    private $showFieldsTemplate;
    private $fieldsTemplate;
    private $tableThTemplate;
    private $tableTdTemplate;

    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->folderPath = "resources/views/vendor/cruder/cms/" . Str::snake($this->modelName) . "s/";
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
        $this->indexTemplate = file_get_contents(__DIR__ . '/../templates/views/pages/index.stub');
        $this->createTemplate = file_get_contents(__DIR__ . '/../templates/views/pages/create.stub');
        $this->editTemplate = file_get_contents(__DIR__ . '/../templates/views/pages/edit.stub');
        $this->showTemplate = file_get_contents(__DIR__ . '/../templates/views/pages/show.stub');
        $this->showFieldsTemplate = file_get_contents(__DIR__ . '/../templates/views/components/fields.stub');
        $this->fieldsTemplate = file_get_contents(__DIR__ . '/../templates/views/components/show_fields.stub');
        $this->tableThTemplate = file_get_contents(__DIR__ . '/../templates/views/components/table_th.stub');
        $this->tableTdTemplate = file_get_contents(__DIR__ . '/../templates/views/components/table_td.stub');
    }

    protected function replaceVariables()
    {
        $this->template = str_replace('%MODEL_NAME%', $this->modelName, $this->indexTemplate);
    }

    protected function store()
    {
        FileUtil::newFile($this->folderPath, "index.blade.php", $this->indexTemplate);
        FileUtil::newFile($this->folderPath, "create.blade.php", $this->createTemplate);
        FileUtil::newFile($this->folderPath, "edit.blade.php", $this->editTemplate);
        FileUtil::newFile($this->folderPath, "show.blade.php", $this->showTemplate);
        FileUtil::newFile($this->folderPath, "show_fields.blade.php", $this->showFieldsTemplate);
        FileUtil::newFile($this->folderPath, "fields.blade.php", $this->fieldsTemplate);
        FileUtil::newFile($this->folderPath, "table_th.blade.php", $this->tableThTemplate);
        FileUtil::newFile($this->folderPath, "table_td.blade.php", $this->tableTdTemplate);
    }

    private function createFields()
    {
        # code...
    }

    private function createShowFields()
    {
        # code...
    }

    private function createTableThs()
    {
        # code...
    }

    private function createTableTds()
    {
        # code...
    }
}
