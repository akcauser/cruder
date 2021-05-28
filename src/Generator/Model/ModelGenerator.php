<?php

namespace Encodeurs\Cruder\Generator\Model;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\FileUtil;
use Encodeurs\Cruder\Utils\ModelUtil;

class ModelGenerator extends Generator
{
    private $fields;
    private $tableName;
    private $softDelete;
    private $fillableFields = "";
    private $traits = "";
    private $usePart = "";
    private $validationRules = "";
    private $relationFields;
    private $relationFieldsContent;

    public function __construct($modelName, $fields, $softDelete, $tableName, $relationFields)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.model');
        $this->targetFile = $this->modelName . '.php';
        $this->fileChangeType = "new";
        $this->templatePath = __DIR__ . '/../../templates/models/model.stub';

        $this->fields = $fields;
        $this->softDelete = $softDelete;
        $this->tableName = $tableName;
        $this->relationFields = $relationFields;

        parent::__construct();
    }

    protected function generate()
    {
        $this->generateTraits();
        $this->generateFillableFields();
        $this->generateValidationRules();
        $this->generateRelationFunctions();
        parent::generate();
    }

    protected function replaceVariables()
    {
        parent::replaceVariables();
        $this->template = str_replace('%USE_PART%', $this->usePart, $this->template);
        $this->template = str_replace('%TRAITS%', $this->traits, $this->template);
        $this->template = str_replace('%TABLE_NAME%', $this->tableName, $this->template);
        $this->template = str_replace('%FILLABLE_FIELDS_ARRAY%', $this->fillableFields, $this->template);
        $this->template = str_replace('%VALIDATION_RULES%', $this->validationRules, $this->template);
        $this->template = str_replace('%RELATION_FUNCTIONS%', $this->relationFieldsContent, $this->template);
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

        foreach ($this->relationFields as $field) {
            $this->validationRules .= "'" . $field['fieldName'] . "' => 'exists:" . $field["foreignTable"] . "," . $field["foreignField"] . "',\n\t\t";
        }
    }

    public function generateRelationFunctions()
    {
        foreach ($this->relationFields as $relationField) {
            $code = ModelUtil::generateRelationFunction($relationField);
            $this->relationFieldsContent  .= $code . "\n\t\t\t";
        }
    }
}
