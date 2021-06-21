<?php

namespace Encodeurs\Cruder\Generator\Routes;

use Encodeurs\Cruder\Generator\Abstract\Generator;

class ApiRouteGenerator extends Generator
{
    private $fields;

    public function __construct($modelName, $fields)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.route');
        $this->targetFile = config('cruder.api_route');
        $this->templatePath = __DIR__ . '/../../templates/routes/api_routes.stub';
        $this->fileChangeType = "put";

        $this->fields = $fields;

        parent::__construct();
    }

    protected function replaceVariables()
    {
        /**
         * 1 tane bile dosya var ise multipart-form data oluyor, bu durumda post metodu ile update yapılıyor.
         */
        $defaultMethod = "put";
        foreach ($this->fields as $field) {
            if ($field["htmltype"] == "image") {
                $defaultMethod = "post";
                break;
            }
        }
        // %UPDATE_METHOD%   
        $this->template = str_replace("%UPDATE_METHOD%", $defaultMethod, $this->template);

        parent::replaceVariables();
    }
}
