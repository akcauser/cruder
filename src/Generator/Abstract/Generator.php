<?php

namespace Encodeurs\Cruder\Generator\Abstract;

use Encodeurs\Cruder\Utils\FileUtil;
use Encodeurs\Cruder\Utils\StringUtil;

abstract class Generator
{
    protected $modelName;
    protected $templatePath;
    protected $targetFolder;
    protected $targetFile;
    protected $fileChangeType;
    protected $template;

    public function __construct()
    {
        $this->generate();
        $this->store();
    }

    protected function getModelNameSnakeCase()
    {
        return StringUtil::snakeCase($this->modelName);
    }

    protected function getModelNameCamelCase()
    {
        return StringUtil::camelCase($this->modelName);
    }

    protected function getModelName()
    {
        return $this->modelName;
    }

    protected function convertPlural($string)
    {
        return StringUtil::convertPlural($string);
    }

    protected function generate()
    {
        $this->getTemplate();
        $this->replaceVariables();
    }

    protected function getTemplate()
    {
        $this->template = file_get_contents($this->templatePath);
    }

    protected function replaceVariables()
    {
        // Singular
        $this->template = str_replace('%MODEL_NAME%', $this->getModelName(), $this->template);
        $this->template = str_replace('%MODEL_NAME_CAMEL_CASE%', $this->getModelNameCamelCase(), $this->template);
        $this->template = str_replace('%MODEL_NAME_SNAKE_CASE%', $this->getModelNameSnakeCase(), $this->template);
        // Plural
        $this->template = str_replace('%MODEL_NAME_PLURAL%', $this->convertPlural($this->getModelName()), $this->template);
        $this->template = str_replace('%MODEL_NAME_CAMEL_CASE_PLURAL%', $this->convertPlural($this->getModelNameCamelCase()), $this->template);
        $this->template = str_replace('%MODEL_NAME_SNAKE_CASE_PLURAL%', $this->convertPlural($this->getModelNameSnakeCase()), $this->template);

        // REPLACE NAMESPACE
        $this->template = str_replace('%MODEL_NAMESPACE%', config('cruder.namespace.model'), $this->template);
        $this->template = str_replace('%CONTROLLER_NAMESPACE%', config('cruder.namespace.controller'), $this->template);
        $this->template = str_replace('%API_CONTROLLER_NAMESPACE%', config('cruder.namespace.controller') . "\\" . config('cruder.api_prefix'), $this->template);
        $this->template = str_replace('%CMS_CONTROLLER_NAMESPACE%', config('cruder.namespace.controller') . "\\" . config('cruder.cms_prefix'), $this->template);
        $this->template = str_replace('%FACTORY_NAMESPACE%', config('cruder.namespace.factory'), $this->template);
        $this->template = str_replace('%SEEDER_NAMESPACE%', config('cruder.namespace.seeder'), $this->template);
        $this->template = str_replace('%TEST_NAMESPACE%', config('cruder.namespace.test'), $this->template);
        $this->template = str_replace('%REQUEST_NAMESPACE%', config('cruder.namespace.request'), $this->template);
        $this->template = str_replace('%PROVIDER_NAMESPACE%', config('cruder.namespace.provider'), $this->template);
        $this->template = str_replace('%SERVICE_NAMESPACE%', config('cruder.namespace.service'), $this->template);
        $this->template = str_replace('%DATA_SERVICE_NAMESPACE%', config('cruder.namespace.data_service'), $this->template);
        // REPLACE PREFIX
    }

    protected function store()
    {
        if ($this->fileChangeType == 'new') {
            FileUtil::newFile($this->targetFolder, $this->targetFile, $this->template);
        } elseif ($this->fileChangeType == 'put') {
            FileUtil::putContent($this->targetFolder . $this->targetFile, $this->template);
        }
    }
}
