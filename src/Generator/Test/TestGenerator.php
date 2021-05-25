<?php

namespace Encodeurs\Cruder\Generator\Test;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Illuminate\Support\Str;


class TestGenerator extends Generator
{
    private $fields;
    private $tableName;
    private $assignFields;
    private $updateAssignFields;
    private $prefix;
    private $assertDeleted;
    private $softDelete;

    public function __construct($modelName, $fields, $tableName, $softDelete)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.test');
        $this->targetFile = config('cruder.api_prefix') . $this->modelName . 'Test.php';
        $this->fileChangeType = "new";
        $this->templatePath = __DIR__ . '/../../templates/tests/api_tests.stub';

        $this->fields = $fields;
        $this->softDelete = $softDelete;
        $this->tableName = $tableName;

        parent::__construct();
    }

    protected function generate()
    {
        $this->generateAssertFields();
        $this->generateUpdateAssertFields();
        $this->generateAssertDeleted();

        parent::generate();
    }

    protected function replaceVariables()
    {
        $this->template = str_replace('%ASSERT_DELETED%', $this->assertDeleted, $this->template);
        $this->template = str_replace('%ASSERT_FIELDS%', $this->assignFields, $this->template);
        $this->template = str_replace('%UPDATE_ASSERT_FIELDS%', $this->updateAssignFields, $this->template);
        $this->template = str_replace('%TABLE_NAME%', $this->tableName, $this->template);
        parent::replaceVariables();
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

    public function generateAssertDeleted()
    {
        if ($this->softDelete) {
            $this->assertDeleted = '$this->assertSoftDeleted("%TABLE_NAME%", $%MODEL_NAME_CAMEL_CASE%->getAttributes());';
        } else {
            $this->assertDeleted = '$this->assertDeleted("%TABLE_NAME%", $%MODEL_NAME_CAMEL_CASE%->getAttributes());';
        }
    }
}
