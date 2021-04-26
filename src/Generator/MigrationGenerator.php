<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FieldUtil;
use Akcauser\Cruder\Utils\FileUtil;
use Illuminate\Support\Str;


class MigrationGenerator
{
    private $tableName;
    private $template;
    private $folderPath;
    private $fields;
    private $softDelete;
    private $primaryKey;
    private $timestamps;
    private $fieldContent = "";

    public function __construct($modelName, $tableName, $fields, $softDelete, $primaryKey, $timestamps)
    {
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
        $this->template = str_replace('%FIELDS%', $this->fieldContent, $this->template);
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
    }
}


// todo: id, timestamp, primary_key