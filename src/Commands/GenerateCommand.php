<?php

namespace Akcauser\Cruder\Commands;

use Akcauser\Cruder\Generator\MigrationGenerator;
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

        // Create Migration 
        new MigrationGenerator($modelName);
        // Store to File


        // Get Model Features

        // pagination
        // custom_table_name
        // soft delete
        // swagger 
        // Datatables

        // Get Fields
        // Get Validation Rules

        // Create Migration 
        // Store to File

        // Create Model
        // Store to File

        // Create Repository Interface
        // Store to File

        // Create Repository
        // Store to File

        // Create Factory
        // Store to File

        // Create Seeder?
        // Store to File

        // Create Controller
        // Store to File

        // Add Web Views
        // Store to File

        // Add Web Routes
        // Add to File

        // Add Api Routes
        // Add to File

        return;
    }
}
