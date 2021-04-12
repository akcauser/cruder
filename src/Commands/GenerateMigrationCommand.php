<?php

namespace Akcauser\Cruder\Commands;

use Akcauser\Cruder\Generator\MigrationGenerator;
use Illuminate\Console\Command;

class GenerateMigrationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cruder:migration {MODEL_NAME}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a migration';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Get Model Name
        $modelName = $this->argument('MODEL_NAME');

        // Create Migration 
        new MigrationGenerator($modelName);
        // Store to File

        return;
    }
}
