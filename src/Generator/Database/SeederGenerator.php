<?php

namespace Encodeurs\Cruder\Generator\Database;

use Encodeurs\Cruder\Generator\Abstract\Generator;


class SeederGenerator extends Generator
{
    public function __construct($modelName)
    {
        $this->modelName = $modelName;
        $this->targetFolder = config('cruder.seeders_path');
        $this->targetFile = $this->modelName . 'Seeder.php';
        $this->fileChangeType = "new";
        $this->templatePath = __DIR__ . '/../../templates/models/seeder.stub';
        $this->generate();
    }
}
