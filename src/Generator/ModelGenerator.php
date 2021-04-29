<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FileUtil;


class ModelGenerator
{
    private $modelName;
    private $template;
    private $folderPath;
    private $fields;
    private $tableName;
    private $softDelete;
    private $fillableFields = "";
    private $traits = "";
    private $usePart = "";

    public function __construct($modelName, $fields, $softDelete, $tableName)
    {
        $this->modelName = $modelName;
        $this->fields = $fields;
        $this->softDelete = $softDelete;
        $this->tableName = $tableName;
        $this->folderPath = config('cruder.models_path');

        $this->generate();
    }

    protected function generate()
    {
        $this->getTemplate();
        $this->generateTraits();
        $this->generateFillableFields();
        $this->replaceVariables();
        $this->store();
    }

    protected function getTemplate()
    {
        $this->template = file_get_contents(__DIR__ . '/../templates/models/model.stub');
    }

    protected function replaceVariables()
    {
        //%MODEL_NAME%
        $this->template = str_replace('%MODEL_NAME%', $this->modelName, $this->template);
        //%USE_PART%
        $this->template = str_replace('%USE_PART%', $this->usePart, $this->template);
        //%TRAITS%
        $this->template = str_replace('%TRAITS%', $this->traits, $this->template);
        //%TABLE_NAME%
        $this->template = str_replace('%TABLE_NAME%', $this->tableName, $this->template);
        //%FILLABLE_FIELDS_ARRAY%
        $this->template = str_replace('%FILLABLE_FIELDS_ARRAY%', $this->fillableFields, $this->template);
    }

    protected function store()
    {
        $fileName = $this->modelName . '.php';

        FileUtil::newFile($this->folderPath, $fileName, $this->template);
    }

    public function generateFillableFields()
    {
        foreach ($this->fields as $field) {
            $this->fillableFields .= "'" . $field['name'] . "'";
        }
    }

    public function generateTraits()
    {
        if ($this->softDelete) {
            $this->usePart .= 'use Illuminate\Database\Eloquent\SoftDeletes;' . "\n";
            $this->traits .= 'use SoftDeletes;' . "\n\t";
        }
    }
}
