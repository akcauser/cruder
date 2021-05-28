<?php

namespace Encodeurs\Cruder\Generator\HTML;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\FieldUtil;
use Encodeurs\Cruder\Utils\FileUtil;

class FieldsGenerator extends Generator
{
    protected $modelName;
    protected $targetFolder;
    protected $template = "";
    protected $targetFile = "fields.blade.php";
    private $fields;
    private $relationFields;

    public function __construct($modelName, $fields, $relationFields)
    {
        $this->modelName = $modelName;
        $this->fileChangeType = "new";
        $this->fields = $fields;
        $this->targetFolder = config('cruder.path.view') . "cms/" . $this->convertPlural($this->getModelNameSnakeCase()) . "/";

        $this->relationFields = $relationFields;

        parent::__construct();
    }

    protected function getTemplate()
    {
        foreach ($this->fields as $field) {
            $fieldContent = FieldUtil::generateHTMLField($field);
            $this->template .= $fieldContent . "\n";
        }

        foreach ($this->relationFields as $relationField) {
            $fieldContent = FieldUtil::generateHTMLRelationField($relationField);
            $this->template .= $fieldContent . "\n";
        }
    }
}
