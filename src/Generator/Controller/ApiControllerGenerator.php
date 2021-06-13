<?php

namespace Encodeurs\Cruder\Generator\Controller;

use Encodeurs\Cruder\Generator\Abstract\Generator;
use Encodeurs\Cruder\Utils\FileUtil;

class ApiControllerGenerator extends Generator
{
    private $swagger;

    public function __construct($modelName, $swagger)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.path.controller') . config('cruder.api_prefix') . "/";
        $this->templatePath = __DIR__ . '/../../templates/controller/api_controller.stub';
        $this->targetFile = config('cruder.api_prefix') . $this->modelName . 'Controller.php';
        $this->fileChangeType = "new";
        $this->swagger = $swagger;

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

        parent::replaceVariables();
    }
}
