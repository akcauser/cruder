<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FileUtil;
use Illuminate\Support\Str;

class DataServiceConcreteGenerator
{
    private $modelName;
    private $template;
    private $folderPath;
    private $fields;
    private $assignFields;

    public function __construct($modelName, $fields)
    {
        $this->modelName = $modelName;
        $this->fields = $fields;
        $this->folderPath = config('cruder.dataservice_paths.concrete');

        $this->generate();
    }

    protected function generate()
    {
        $this->getTemplate();
        $this->generateAssignFields();
        $this->replaceVariables();
        $this->store();
    }

    protected function getTemplate()
    {
        $this->template = file_get_contents(__DIR__ . '/../templates/services/dataservice_concrete.stub');
    }

    protected function replaceVariables()
    {
        $this->template = str_replace('%MODEL_NAME%', $this->modelName, $this->template);
        $this->template = str_replace('%MODEL_NAME_CAMEL_CASE%', Str::camel($this->modelName), $this->template);
        $this->template = str_replace('%ASSIGN_FIELDS%', $this->assignFields, $this->template);
    }

    protected function store()
    {
        $fileName = $this->modelName . 'DataService.php';

        FileUtil::newFile($this->folderPath, $fileName, $this->template);
    }

    public function generateAssignFields()
    {
        foreach ($this->fields as $field) {
            $this->assignFields .= '$' . Str::camel($this->modelName) . '->' . $field['name'] . ' = $data["' . $field['name'] . '"];' . "\n\t\t";
        }
    }
}