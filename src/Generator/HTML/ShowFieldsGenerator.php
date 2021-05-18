<?php

namespace Akcauser\Cruder\Generator\HTML;

use Akcauser\Cruder\Generator\Abstract\Generator;

class ShowFieldsGenerator extends Generator
{
    protected $modelName;
    protected $targetFolder;
    protected $template = "";
    protected $targetFile = "show_fields.blade.php";
    private $fields;

    public function __construct($modelName, $fields)
    {
        $this->modelName = $modelName;
        $this->fields = $fields;
        $this->fileChangeType = "new";
        $this->targetFolder = "resources/views/cms/" . $this->convertPlural($this->getModelNameSnakeCase()) . "/";
        $this->generate();
    }

    protected function getTemplate()
    {
        $this->template .= '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">id:</h5>
        <small>integer</small>
    </div>
    <p class="mb-1">{{ $%MODEL_NAME_CAMEL_CASE%->id }}</p>
</a>';
        foreach ($this->fields as $field) {
            $fieldContent = file_get_contents(__DIR__ . '/../../templates/views/components/show_field.stub');
            $fieldContent = str_replace('%FIELD_NAME%', $field["name"], $fieldContent);
            $fieldContent = str_replace('%FIELD_DB_TYPE%', $field["dbtype"], $fieldContent);
            $this->template .= $fieldContent . "\n";
        }
        $this->template .= '<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">created at:</h5>
        <small>timestamp</small>
    </div>
    <p class="mb-1">{{ $%MODEL_NAME_CAMEL_CASE%->created_at }}</p>
</a>';
        $this->template .= '
<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1">updated at:</h5>
        <small>timestamp</small>
    </div>
    <p class="mb-1">{{ $%MODEL_NAME_CAMEL_CASE%->updated_at }}</p>
</a>';
    }
}
