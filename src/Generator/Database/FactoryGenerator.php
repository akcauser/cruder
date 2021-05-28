<?php

namespace Encodeurs\Cruder\Generator\Database;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\Factory\FactoryRelationField;
use Encodeurs\Cruder\Utils\FieldUtil;


class FactoryGenerator extends Generator
{
    private $fields;
    private $fieldContent;
    private $relationFields;
    private $relationFieldsContent = "";

    public function __construct($modelName, $fields, $relationFields)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.factory');
        $this->templatePath = __DIR__ . '/../../templates/models/factory.stub';
        $this->targetFile = $this->modelName . 'Factory.php';
        $this->fileChangeType = "new";
        $this->fields = $fields;
        $this->relationFields = $relationFields;

        parent::__construct();
    }

    protected function generate()
    {
        $this->generateFieldContent();
        $this->generateRelationFieldsContent();
        parent::generate();
    }

    protected function replaceVariables()
    {
        parent::replaceVariables();
        $this->template = str_replace('%FIELDS%', $this->fieldContent, $this->template);
        $this->template = str_replace('%RELATION_FIELDS%', $this->relationFieldsContent, $this->template);
    }

    protected function generateFieldContent()
    {
        foreach ($this->fields as $field) {
            $code = FieldUtil::generateFactoryField($field);
            $this->fieldContent  .= $code . "\n\t\t\t";
        }
    }

    public function generateRelationFieldsContent()
    {
        foreach ($this->relationFields as $relationField) {
            $code = FactoryRelationField::create($relationField);
            $this->relationFieldsContent  .= $code . "\n\t\t\t";
        }
    }
}
