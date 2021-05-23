<?php

namespace Encodeurs\Cruder\Generator\Schema;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\FieldUtil;

class SchemaJsonGenerator extends Generator
{
    private $fields;
    private $jsonFields = "";
    private $paginate;
    private $softDelete;
    private $forceMigrate;
    private $timestamps;
    private $tableName;

    public function __construct($modelName, $fields, $paginate, $softDelete, $forceMigrate, $timestamps, $tableName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = "resources/cruder_schemas/";
        $this->templatePath = __DIR__ . '/../../templates/schema/json.stub';
        $this->targetFile = $modelName . '.json';
        $this->fileChangeType = "new";
        $this->fields = $fields;
        $this->paginate = $paginate;
        $this->softDelete = $softDelete;
        $this->forceMigrate = $forceMigrate;
        $this->timestamps = $timestamps;
        $this->tableName = $tableName;

        $this->generate();
    }

    protected function generate()
    {
        $this->getTemplate();
        $this->generateFields();
        $this->customReplaceVariables();
        $this->replaceVariables();
        $this->store();
    }

    private function customReplaceVariables()
    {
        $this->template = str_replace('%TABLE_NAME%', $this->tableName, $this->template);
        $this->template = str_replace('%PAGINATE%', $this->paginate, $this->template);
        $this->template = str_replace('%SOFT_DELETE%', $this->softDelete ? "true" : "false", $this->template);
        $this->template = str_replace('%FORCE_MIGRATE%', $this->forceMigrate ? "true" : "false", $this->template);
        $this->template = str_replace('%TIMESTAMPS%', $this->timestamps ? "true" : "false", $this->template);
        $this->template = str_replace('%SWAGGER%', "false", $this->template);
        $this->template = str_replace('%FIELDS%', $this->jsonFields, $this->template);
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
}
