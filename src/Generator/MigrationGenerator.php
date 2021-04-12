<?php

namespace Akcauser\Cruder\Generator;

use Illuminate\Support\Facades\Artisan;

class MigrationGenerator
{
    private $tableName;
    private $template;
    private $code;

    public function __construct($tableName)
    {
        $this->tableName = $tableName;

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
        return file_get_contents(__DIR__ . '/../templates/models/migration.stub');
    }

    protected function replaceVariables()
    {
        # code
        $this->code = $this->template;
    }

    protected function store()
    {
        $res = Artisan::call('make:migration Create' . $this->modelName . 'Table');

        $migrationFileName = date('y') . '_' . date('m') . '_' . date('d') . '_' . 'create' . ucfirst($this->tableName) . 'Table';

        echo $res;
        //file_put_contents(config('cruder.migrations_path'), $this->code);
    }
}
