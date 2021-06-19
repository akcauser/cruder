<?php

namespace Encodeurs\Cruder\Generator\Service;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\BusinessRulesUtil;

class ServiceConcreteGenerator extends Generator
{
    private $businessRules = "";
    private $fields;

    public function __construct($modelName, $fields)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.service') . "Concrete/";
        $this->targetFile = $this->modelName . 'Service.php';
        $this->fileChangeType = "new";
        $this->templatePath = __DIR__ . '/../../templates/services/service_concrete.stub';

        $this->fields = $fields;

        parent::__construct();
    }

    protected function replaceVariables()
    {
        // add business rules
        $this->template = str_replace('%BUSINESS_RULES%', $this->businessRules, $this->template);
        parent::replaceVariables();
    }

    protected function generate()
    {
        // generate field business rules 
        foreach ($this->fields as $field) {
            if ($field["htmltype"] == "image") {
                $this->businessRules .= BusinessRulesUtil::imageGenerate($field);
            }
        }
        parent::generate();
    }
}
