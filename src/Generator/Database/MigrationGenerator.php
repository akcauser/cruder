<?php

namespace Encodeurs\Cruder\Generator\Database;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\DatabaseUtil;
use Encodeurs\Cruder\Utils\DB\DBRelationField;
use Encodeurs\Cruder\Utils\DBFieldUtil;


class MigrationGenerator extends Generator
{
    private $tableName;
    private $fields;
    private $softDelete;
    private $primaryKey;
    private $timestamps;
    private $fieldContent = "";
    private $indexFieldsContent = "";
    private $relationFields;
    private $relationFieldsContent = "";

    public function __construct($modelName, $tableName, $fields, $softDelete, $primaryKey, $timestamps, $relationFields)
    {
        $this->tableName = $tableName;

        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.migration');
        $this->targetFile = date('Y_m_d_His') . '_' . 'create_' . $this->tableName . '_table.php';
        $this->fileChangeType = "new";
        $this->templatePath = __DIR__ . '/../../templates/models/migration.stub';

        $this->fields = $fields;
        $this->softDelete = $softDelete;
        $this->primaryKey = $primaryKey;
        $this->timestamps = $timestamps;
        $this->relationFields = $relationFields;

        parent::__construct();
    }

    protected function generate()
    {
        $this->generateFieldContent();
        $this->generateRelationFieldContent();
        parent::generate();
    }

    protected function replaceVariables()
    {
        parent::replaceVariables();
        $this->template = str_replace('%PRIMARY_KEY%', $this->primaryKey, $this->template);
        $this->template = str_replace('%FIELDS%', $this->fieldContent, $this->template);
        $this->template = str_replace('%TABLE_NAME_CAPITALCASE%', $this->modelName . 's', $this->template); //todo: hata var
        $this->template = str_replace('%TABLE_NAME%', $this->tableName, $this->template);
        $this->template = str_replace('%RELATION_FIELDS%', $this->relationFieldsContent, $this->template);
        $this->template = str_replace('%INDEX_FIELDS%', $this->indexFieldsContent, $this->template);
    }

    protected function generateFieldContent()
    {
        foreach ($this->fields as $field) {
            $code = DBFieldUtil::generateDBField($field);
            $this->fieldContent  .= $code . "\n\t\t\t";
        }

        if ($this->softDelete) {
            $this->fieldContent  .= '$table->softDeletes();' . "\n\t\t\t";
        }

        if ($this->timestamps) {
            $this->fieldContent  .= '$table->timestamps();' . "\n\t\t\t";
        }

        $this->indexFieldsContent = DatabaseUtil::generateIndexFields($this->fields);
    }

    protected function generateRelationFieldContent()
    {
        foreach ($this->relationFields as $relationField) {
            $code = DBRelationField::create($relationField);
            $this->relationFieldsContent  .= $code . "\n\t\t\t";
        }
    }
}
