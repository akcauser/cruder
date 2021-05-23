<?php

namespace Encodeurs\Cruder\Generator;

use Encodeurs\Cruder\Utils\DatabaseUtil;
use Encodeurs\Cruder\Utils\FieldUtil;
use Encodeurs\Cruder\Utils\FileUtil;
use Illuminate\Support\Str;


class MigrationGenerator
{
    private $modelName;
    private $tableName;
    private $template;
    private $folderPath;
    private $fields;
    private $softDelete;
    private $primaryKey;
    private $timestamps;
    private $fieldContent = "";
    private $indexFieldsContent = "";

    public function __construct($modelName, $tableName, $fields, $softDelete, $primaryKey, $timestamps)
    {
        $this->modelName = $modelName;
        $this->tableName = $tableName;
        $this->folderPath = config('cruder.migrations_path');
        $this->fields = $fields;
        $this->softDelete = $softDelete;
        $this->primaryKey = $primaryKey;
        $this->timestamps = $timestamps;

        $this->generate();
    }

    protected function generate()
    {
        $this->getTemplate();
        $this->generateFieldContent();
        $this->replaceVariables();
        $this->store();
    }

    protected function getTemplate()
    {
        $this->template = file_get_contents(__DIR__ . '/../templates/models/migration.stub');
    }

    protected function replaceVariables()
    {
        $this->template = str_replace('%PRIMARY_KEY%', $this->primaryKey, $this->template);
        $this->template = str_replace('%FIELDS%', $this->fieldContent, $this->template);
        $this->template = str_replace('%TABLE_NAME_CAPITALCASE%', $this->modelName . 's', $this->template);
        $this->template = str_replace('%TABLE_NAME%', $this->tableName, $this->template);
        $this->template = str_replace('%TABLE_NAME%', $this->tableName, $this->template);
        $this->template = str_replace('%INDEX_FIELDS%', $this->indexFieldsContent, $this->template);
    }

    protected function store()
    {
        $fileName = date('Y_m_d_His') . '_' . 'create_' . $this->tableName . '_table.php';

        FileUtil::newFile($this->folderPath, $fileName, $this->template);
    }

    public static function generateTableName($modelName)
    {
        return Str::snake($modelName) . 's';
    }

    protected function generateFieldContent()
    {
        foreach ($this->fields as $field) {
            $code = FieldUtil::generateDBField($field);
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
}
