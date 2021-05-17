<?php

namespace Akcauser\Cruder\Generator\Abstract;

use Akcauser\Cruder\Utils\FileUtil;
use Illuminate\Support\Str;

abstract class Generator
{
    protected $modelName;
    protected $templatePath;
    protected $targetFolder;
    protected $targetFile;
    protected $fileChangeType;
    protected $template;

    protected function getModelNameSnakeCase()
    {
        return Str::snake($this->modelName);
    }

    protected function getModelNameCamelCase()
    {
        return Str::snake($this->modelName);
    }

    protected function getModelName()
    {
        return $this->modelName;
    }

    protected function convertPlural($string)
    {
        return $string . "s";
    }

    protected function generate()
    {
        $this->getTemplate();
        $this->replaceVariables();
        $this->store();
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
