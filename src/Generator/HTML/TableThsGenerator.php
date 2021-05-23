<?php

namespace Encodeurs\Cruder\Generator\HTML;

use Encodeurs\Cruder\Generator\Abstract\Generator;

class TableThsGenerator extends Generator
{
    protected $modelName;
    protected $targetFolder;
    protected $template = "";
    private $fields;

    public function __construct($modelName, $fields)
    {
        $this->modelName = $modelName;
        $this->fields = $fields;
        $this->fileChangeType = "new";
        $this->targetFolder = "resources/views/cms/" . $this->convertPlural($this->getModelNameSnakeCase()) . "/";
        $this->targetFile = "table_th.blade.php";
        $this->generate();
    }

    protected function getTemplate()
    {
        $this->template .= "<th>#</th>" . "\n";
        foreach ($this->fields as $field) {
            $fieldContent = file_get_contents(__DIR__ . '/../../templates/views/components/table_th.stub');
            $fieldContent = str_replace('%FIELD_NAME%', $field["name"], $fieldContent);
            $this->template .= $fieldContent . "\n";
        }
        $this->template .= "<th>created</th>";
        $this->template .= "<th>actions</th>";
    }
}
