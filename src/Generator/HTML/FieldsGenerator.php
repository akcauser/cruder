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

    public function __construct($modelName, $fields)
    {
        $this->modelName = $modelName;
        $this->fileChangeType = "new";
        $this->fields = $fields;
        $this->targetFolder = "resources/views/cms/" . $this->convertPlural($this->getModelNameSnakeCase()) . "/";
        $this->generate();
    }

    protected function getTemplate()
    {
        foreach ($this->fields as $field) {
            $fieldContent = FieldUtil::generateHTMLField($field);
            $this->template .= $fieldContent . "\n";
        }
    }
}
