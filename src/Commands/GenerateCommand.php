<?php

namespace Akcauser\Cruder\Commands;

use Akcauser\Cruder\Generator\ApiControllerGenerator;
use Akcauser\Cruder\Generator\ApiRouteGenerator;
use Akcauser\Cruder\Generator\TestGenerator;
use Akcauser\Cruder\Generator\FactoryGenerator;
use Akcauser\Cruder\Generator\MigrationGenerator;
use Akcauser\Cruder\Generator\ModelGenerator;
use Akcauser\Cruder\Generator\RepositoryAbstractGenerator;
use Akcauser\Cruder\Generator\RepositoryConcreteGenerator;
use Akcauser\Cruder\Generator\RepositoryProviderGenerator;
use Akcauser\Cruder\Generator\SeederGenerator;
use Akcauser\Cruder\Generator\WebControllerGenerator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class GenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cruder:new {MODEL_NAME}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a CRUD';

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

        /*
        // todo: echo api details 
        $confirm = $this->confirm('Is correct, do you wish to continue? [y|N]');
        if (!$confirm) {
            // not confirmed
            return $this->error('Cancelled');
        }
        */

        // Generate Migration 
        new MigrationGenerator($modelName);

        // Generate Model 
        new ModelGenerator($modelName);

        // Generate Factory
        new FactoryGenerator($modelName);

        // Generate Seeder
        new SeederGenerator($modelName);

        // Generate Api Controller
        new ApiControllerGenerator($modelName);

        // Generate Web Controller
        new WebControllerGenerator($modelName);

        // Generate Repository Interface
        new RepositoryAbstractGenerator($modelName);

        // Generate Repository Concrete
        new RepositoryConcreteGenerator($modelName);

        // Generate Api Test
        new TestGenerator($modelName);

        // Add Api Routes
        new ApiRouteGenerator($modelName);

        // Register repository service provider
        new RepositoryProviderGenerator($modelName);

        // Get Model Features
        // pagination
        // custom_table_name
        // soft delete
        // swagger 
        // Datatables

        // Get Fields
        // Get Validation Rules

        // Add Web Views
        // Store to File

        // Add Web Routes
        // Add to File

        // Add Api Routes
        // Add to File

        return;
    }
}
