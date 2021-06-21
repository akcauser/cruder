<?php

namespace Encodeurs\Cruder\Generator\Controller;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\FileUtil;

class ApiControllerGenerator extends Generator
{
    private $swagger;
    private $fields;

    public function __construct($modelName, $swagger, $fields)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.controller') . config('cruder.api_prefix') . "/";
        $this->templatePath = __DIR__ . '/../../templates/controller/api_controller.stub';
        $this->targetFile = config('cruder.api_prefix') . $this->modelName . 'Controller.php';
        $this->fileChangeType = "new";
        $this->swagger = $swagger;
        $this->fields = $fields;

        parent::__construct();
    }

    protected function replaceVariables()
    {
        $swaggerListTemplate = "";
        $swaggerShowTemplate = "";
        $swaggerStoreTemplate = "";
        $swaggerUpdateTemplate = "";
        $swaggerDestroyTemplate = "";

        if ($this->swagger) {
            $swaggerListTemplate = FileUtil::getContent(__DIR__ . '/../../templates/swagger/list.stub');
            $swaggerShowTemplate = FileUtil::getContent(__DIR__ . '/../../templates/swagger/show.stub');
            $swaggerStoreTemplate = FileUtil::getContent(__DIR__ . '/../../templates/swagger/store.stub');
            $swaggerUpdateTemplate = FileUtil::getContent(__DIR__ . '/../../templates/swagger/update.stub');
            $swaggerDestroyTemplate = FileUtil::getContent(__DIR__ . '/../../templates/swagger/destroy.stub');
        }
        $this->template = str_replace('%SWAGGER_LIST%', $swaggerListTemplate, $this->template);
        $this->template = str_replace('%SWAGGER_SHOW%', $swaggerShowTemplate, $this->template);
        $this->template = str_replace('%SWAGGER_STORE%', $swaggerStoreTemplate, $this->template);
        $this->template = str_replace('%SWAGGER_UPDATE%', $swaggerUpdateTemplate, $this->template);
        $this->template = str_replace('%SWAGGER_DESTROY%', $swaggerDestroyTemplate, $this->template);

        /**
         * 1 tane bile dosya var ise multipart-form data oluyor, bu durumda post metodu ile update yapılıyor.
         */
        $defaultUpdateMethod = "PUT";
        foreach ($this->fields as $field) {
            if ($field["htmltype"] == "image") {
                $defaultUpdateMethod = "POST";
                break;
            }
        }
        // %UPDATE_METHOD%   
        $this->template = str_replace("%UPDATE_METHOD%", $defaultUpdateMethod, $this->template);

        parent::replaceVariables();
    }
}
