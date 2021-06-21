<?php

namespace Encodeurs\Cruder\Generator\HTML;

use Encodeurs\Cruder\Generator\Abstract\Generator;

class TableTdsGenerator extends Generator
{
    protected $modelName;
    protected $targetFolder;
    protected $template = "";
    private $fields;
    private $primaryKey;

    public function __construct($modelName, $fields, $primaryKey)
    {
        $this->modelName = $modelName;
        $this->fields = $fields;
        $this->fileChangeType = "new";
        $this->targetFolder = config('cruder.path.view') . "cms/" . $this->convertPlural($this->getModelNameSnakeCase()) . "/";
        $this->targetFile = "table_td.blade.php";
        $this->primaryKey = $primaryKey;

        parent::__construct();
    }

    protected function getTemplate()
    {
        $this->template .= '<td>{{$item->id}}</td>';
        foreach ($this->fields as $field) {
            if ($field["htmltype"] == "image") {
                $fieldContent = file_get_contents(__DIR__ . '/../../templates/views/components/custom_table_td/image.stub');
            } elseif ($field["htmltype"] == "textarea") {
                $fieldContent = file_get_contents(__DIR__ . '/../../templates/views/components/custom_table_td/textarea.stub');
            } else {
                $fieldContent = file_get_contents(__DIR__ . '/../../templates/views/components/table_td.stub');
            }
            $fieldContent = str_replace('%FIELD_NAME%', $field["name"], $fieldContent);
            $this->template .= $fieldContent . "\n";
        }
        $this->template .= '<td>
                                {{$item->created_at}}
                                <b>({{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }})</b>
                            </td>';

        $this->template .= '<td>
                                <a href="{{ route(\'cms.%MODEL_NAME_SNAKE_CASE_PLURAL%.show\', [\'%PRIMARY_KEY%\' => $item->%PRIMARY_KEY%]) }}" class="btn btn-secondary btn-sm">show</a>
                                <a href="{{ route(\'cms.%MODEL_NAME_SNAKE_CASE_PLURAL%.edit\', [\'%PRIMARY_KEY%\' => $item->%PRIMARY_KEY%]) }}" class="btn btn-success btn-sm">edit</a>
                                <a class="btn btn-danger btn-sm text-white" onclick="deleteItem({!! $item->%PRIMARY_KEY% !!})">delete</a>
                            </td>';

        $this->template = str_replace('%PRIMARY_KEY%', $this->primaryKey, $this->template);
    }
}
