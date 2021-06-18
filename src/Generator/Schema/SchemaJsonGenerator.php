<?php

namespace Encodeurs\Cruder\Generator\Schema;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\FieldUtil;
use Illuminate\Support\Facades\Date;

class SchemaJsonGenerator extends Generator
{
    private $fields;
    private $jsonFields = "";
    private $paginate;
    private $softDelete;
    private $forceMigrate;
    private $timestamps;
    private $tableName;
    private $relationFields;
    private $relationFieldsJson = "";

    public function __construct($modelName, $fields, $paginate, $softDelete, $forceMigrate, $timestamps, $tableName, $relationFields)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.schema');
        $this->templatePath = __DIR__ . '/../../templates/schema/json.stub';
        $this->targetFile = $modelName . '.json';
        $this->fileChangeType = "new";
        $this->fields = $fields;
        $this->paginate = $paginate;
        $this->softDelete = $softDelete;
        $this->forceMigrate = $forceMigrate;
        $this->timestamps = $timestamps;
        $this->tableName = $tableName;
        $this->relationFields = $relationFields;

        parent::__construct();
    }

    protected function generate()
    {
        $this->generateFields();
        $this->generateRelationFields();
        parent::generate();
    }

    protected function replaceVariables()
    {
        parent::replaceVariables();
        $this->template = str_replace('%TABLE_NAME%', $this->tableName, $this->template);
        $this->template = str_replace('%PAGINATE%', $this->paginate, $this->template);
        $this->template = str_replace('%SOFT_DELETE%', $this->softDelete ? "true" : "false", $this->template);
        $this->template = str_replace('%FORCE_MIGRATE%', $this->forceMigrate ? "true" : "false", $this->template);
        $this->template = str_replace('%TIMESTAMPS%', $this->timestamps ? "true" : "false", $this->template);
        $this->template = str_replace('%SWAGGER%', "false", $this->template);
        $this->template = str_replace('%FIELDS%', $this->jsonFields, $this->template);
        $this->template = str_replace('%CREATED_AT%', Date::now(), $this->template);
        $this->template = str_replace('%RELATION_FIELDS%', $this->relationFieldsJson, $this->template);
    }

    private function generateFields()
    {
        foreach ($this->fields as $key => $field) {
            $jsonField = FieldUtil::generateJsonSchemaField($field);
            $this->jsonFields .= $jsonField;
            if ($key != count($this->fields) - 1)
                $this->jsonFields .= ",";
        }
    }

    private function generateRelationFields()
    {
        foreach ($this->relationFields as $key => $field) {
            $jsonField = FieldUtil::generateJsonSchemaRelationField($field);
            $this->relationFieldsJson .= $jsonField;
            if ($key != count($this->fields) - 1)
                $this->relationFieldsJson .= ",";
        }
    }
}
