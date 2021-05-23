<?php

namespace Encodeurs\Cruder\Generator;

use Encodeurs\Cruder\Utils\FileUtil;


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
    private $validationRules = "";

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
        $this->generateValidationRules();
        $this->replaceVariables();
        $this->store();
    }

    protected function getTemplate()
    {
        $this->template = file_get_contents(__DIR__ . '/../templates/models/model.stub');
    }

    protected function replaceVariables()
    {
        $this->template = str_replace('%MODEL_NAME%', $this->modelName, $this->template);
        $this->template = str_replace('%USE_PART%', $this->usePart, $this->template);
        $this->template = str_replace('%TRAITS%', $this->traits, $this->template);
        $this->template = str_replace('%TABLE_NAME%', $this->tableName, $this->template);
        $this->template = str_replace('%FILLABLE_FIELDS_ARRAY%', $this->fillableFields, $this->template);
        $this->template = str_replace('%VALIDATION_RULES%', $this->validationRules, $this->template);
    }

    protected function store()
    {
        $fileName = $this->modelName . '.php';

        FileUtil::newFile($this->folderPath, $fileName, $this->template);
    }

    public function generateFillableFields()
    {
        foreach ($this->fields as $field) {
            if ($field["fillable"])
                $this->fillableFields .= "'" . $field['name'] . "',\n\t\t";
        }
    }

    public function generateTraits()
    {
        if ($this->softDelete) {
            $this->usePart .= 'use Illuminate\Database\Eloquent\SoftDeletes;' . "\n";
            $this->traits .= 'use SoftDeletes;' . "\n\t";
        }
    }

    public function generateValidationRules()
    {
        foreach ($this->fields as $field) {
            $this->validationRules .= "'" . $field['name'] . "' => '" . $field['validations'] . "',\n\t\t";
        }
    }
}
