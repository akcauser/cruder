<?php

namespace Encodeurs\Cruder\Generator\Database;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\FieldUtil;


class FactoryGenerator extends Generator
{
    private $fields;
    private $fieldContent;

    public function __construct($modelName, $fields)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.factories_path');
        $this->templatePath = __DIR__ . '/../../templates/models/factory.stub';
        $this->targetFile = $this->modelName . 'Factory.php';
        $this->fileChangeType = "new";
        $this->fields = $fields;

        $this->generate();
    }

    protected function generate()
    {
        $this->generateFieldContent();
        parent::generate();
    }

    protected function replaceVariables()
    {
        parent::replaceVariables();
        $this->template = str_replace('%FIELDS%', $this->fieldContent, $this->template);
    }

    protected function generateFieldContent()
    {
        foreach ($this->fields as $field) {
            $code = FieldUtil::generateFactoryField($field);
            $this->fieldContent  .= $code . "\n\t\t\t";
        }
    }
}
