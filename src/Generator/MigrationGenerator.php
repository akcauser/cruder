<?php

namespace Akcauser\Cruder\Generator;

use Akcauser\Cruder\Utils\FileUtil;
use Illuminate\Support\Str;


class MigrationGenerator
{
    private $tableName;
    private $template;
    private $folderPath;

    public function __construct($modelName)
    {
        $this->tableName = Str::snake($modelName) . 's';
        $this->folderPath = config('cruder.migrations_path');

        $this->generate();
    }

    protected function generate()
    {
        $this->getTemplate();
        $this->replaceVariables();
        $this->store();
    }

    protected function getTemplate()
    {
        $this->template = file_get_contents(__DIR__ . '/../templates/models/migration.stub');
    }

    protected function replaceVariables()
    {
        # set variables in templates
    }

    protected function store()
    {
        $fileName = date('Y_m_d_His') . '_' . 'create_' . $this->tableName . '_table.php';

        FileUtil::newFile($this->folderPath, $fileName, $this->template);
    }
}
