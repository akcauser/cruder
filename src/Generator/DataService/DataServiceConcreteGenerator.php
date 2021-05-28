<?php

namespace Encodeurs\Cruder\Generator\DataService;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\FileUtil;
use Illuminate\Support\Str;

class DataServiceConcreteGenerator extends Generator
{
    private $fields;
    private $assignFields;
    private $subQueryFields;
    private $paginate;
    private $relationFields;

    public function __construct($modelName, $fields, $paginate, $relationFields)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.data_service') . "Concrete/";
        $this->targetFile = $this->modelName . 'DataService.php';
        $this->fileChangeType = "new";
        $this->templatePath = __DIR__ . '/../../templates/services/dataservice_concrete.stub';

        $this->fields = $fields;
        $this->paginate = $paginate;
        $this->relationFields = $relationFields;

        parent::__construct();
    }


    protected function generate()
    {
        $this->generateFields();
        parent::generate();
    }

    protected function replaceVariables()
    {
        parent::replaceVariables();
        $this->template = str_replace('%ASSIGN_FIELDS%', $this->assignFields, $this->template);
        $this->template = str_replace('%SUB_QUERY_FIELDS%', $this->subQueryFields, $this->template);
        $this->template = str_replace('%PAGINATE%', $this->paginate, $this->template);
    }

    public function generateFields()
    {
        foreach ($this->fields as $field) {
            $this->assignFields .= '$' . Str::camel($this->modelName) . '->' . $field['name'] . ' = $data["' . $field['name'] . '"];' . "\n\t\t";

            if ($field["searchable"])
                $this->subQueryFields .= '$sQuery->orWhere(\'' . $field['name'] . '\', \'like\', "%$word%");' . "\n\t\t\t\t\t\t";
        }

        foreach ($this->relationFields as $field) {
            $this->assignFields .= '$' . Str::camel($this->modelName) . '->' . $field['fieldName'] . ' = $data["' . $field['fieldName'] . '"];' . "\n\t\t";
        }
    }
}
