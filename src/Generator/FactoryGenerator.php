<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FieldUtil;
use Akcauser\Cruder\Utils\FileUtil;


class FactoryGenerator
{
    private $modelName;
    private $template;
    private $folderPath;
    private $fields;
    private $fieldContent;

    public function __construct($modelName, $fields)
    {
        $this->modelName = $modelName;
        $this->folderPath = config('cruder.factories_path');
        $this->fields = $fields;

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
        $this->template = file_get_contents(__DIR__ . '/../templates/models/factory.stub');
    }

    protected function replaceVariables()
    {
        $this->template = str_replace('%MODEL_NAME%', $this->modelName, $this->template);
        $this->template = str_replace('%FIELDS%', $this->fieldContent, $this->template);
    }

    protected function store()
    {
        $fileName = $this->modelName . 'Factory.php';

        FileUtil::newFile($this->folderPath, $fileName, $this->template);
    }

    protected function generateFieldContent()
    {
        foreach ($this->fields as $field) {
            $code = FieldUtil::generateFactoryField($field);
            $this->fieldContent  .= $code . "\n\t\t\t";
        }
    }
}
