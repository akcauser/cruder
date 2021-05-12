<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FileUtil;
use Illuminate\Support\Str;


class TestGenerator
{
    private $modelName;
    private $template;
    private $folderPath;
    private $fields;
    private $tableName;
    private $assignFields;
    private $updateAssignFields;
    private $prefix;

    public function __construct($modelName, $fields, $tableName)
    {
        $this->modelName = $modelName;
        $this->fields = $fields;
        $this->tableName = $tableName;
        $this->folderPath = config('cruder.tests_path');
        $this->prefix = config('cruder.prefix.api');

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
        $this->template = file_get_contents(__DIR__ . '/../templates/tests/api_tests.stub');
    }

    protected function replaceVariables()
    {
        $this->template = str_replace('%MODEL_NAME%', $this->modelName, $this->template);
        $this->template = str_replace('%MODEL_NAME_CAMEL_CASE%', Str::camel($this->modelName), $this->template);
        $this->template = str_replace('%MODEL_NAME_SNAKE%', Str::snake($this->modelName, "_"), $this->template);
        $this->template = str_replace('%ASSERT_FIELDS%', $this->assignFields, $this->template);
        $this->template = str_replace('%UPDATE_ASSERT_FIELDS%', $this->updateAssignFields, $this->template);
        $this->template = str_replace('%TABLE_NAME%', $this->tableName, $this->template);
    }

    protected function store()
    {
        $fileName = $this->prefix . $this->modelName . 'Test.php';

        FileUtil::newFile($this->folderPath, $fileName, $this->template);
    }

    public function generateAssertFields()
    {
        foreach ($this->fields as $field) {
            $this->assignFields .= '"' . $field['name'] . '" => $' . Str::camel($this->modelName) . '["' . $field['name'] . '"],' . "\n\t\t";
        }
    }

    public function generateUpdateAssertFields()
    {
        foreach ($this->fields as $field) {
            $this->updateAssignFields .= '"' . $field['name'] . '" => $new' . $this->modelName . '["' . $field['name'] . '"],' . "\n\t\t";
        }
    }
}
