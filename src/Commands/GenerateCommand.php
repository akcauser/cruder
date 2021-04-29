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
use Akcauser\Cruder\Utils\FieldUtil;
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

        // Get Fields, DB Types, HTML Types, Validations 
        $fields = [];
        while (true) {
            // 1 tane field talep et
            $field = $this->ask('Please a field, dbtype, htmltype, validation: (example: name string text required|string|max:255)');
            if ($field == "") {
                break;
            }
            $explode = explode(" ", $field);

            // same column control
            if (array_search($explode[0], array_column($fields, "name")) !== false) {
                $this->warn('Column already exist');
                continue;
            }

            // invalid dbtype control
            if (!in_array($explode[1], FieldUtil::$dbtypes)) {
                $this->warn("Invalid dbtype: $explode[1]");
                continue;
            }

            // invalid htmltype control 
            if (!in_array($explode[2], FieldUtil::$htmltypes)) {
                $this->warn("Invalid htmltype: $explode[2]");
                continue;
            }

            // add to fields array 
            array_push($fields, [
                'name' => $explode[0],
                'dbtype' => $explode[1],
                'htmltype' => $explode[2],
                'validations' => $explode[3],
            ]);
        }

        // Ask For Custom Table Name 
        $tableName = $this->ask("Do you want to custom table name?", MigrationGenerator::generateTableName($modelName));

        // Ask SoftDelete Use
        $softDelete = $this->ask("Do you want to Softdelete Feature? [Y|n]", "Y") == "Y" ? true : false;

        // Ask For Custom Primary Key Name 
        $primaryKey = $this->ask("Do you want to custom primary key field? Enter if you want:", "id");

        // Ask Timestamp Use
        $timestamps = $this->ask("Do you want to use Timestamps Feature? [Y|n]", "Y") == "Y" ? true : false;

        // Generate Migration 
        new MigrationGenerator($modelName, $tableName, $fields, $softDelete, $primaryKey, $timestamps);

        // Generate Model 
        new ModelGenerator($modelName, $fields, $softDelete, $tableName);

        // Generate Factory
        new FactoryGenerator($modelName, $fields);

        // Generate Seeder
        new SeederGenerator($modelName);

        // Generate Api Controller
        new ApiControllerGenerator($modelName);

        // Generate Web Controller
        //new WebControllerGenerator($modelName);

        // Generate Repository Interface
        new RepositoryAbstractGenerator($modelName);

        // Generate Repository Concrete
        new RepositoryConcreteGenerator($modelName);

        // Generate Api Test
        //new TestGenerator($modelName);

        // Add Api Routes
        //new ApiRouteGenerator($modelName);

        // Register repository service provider
        //new RepositoryProviderGenerator($modelName);

        // Get Model Features
        // pagination
        // custom_table_name
        // soft delete
        // swagger 
        // Datatables



        // Add Web Views
        // Store to File

        // Add Web Routes
        // Add to File

        // Add Api Routes
        // Add to File


        /*
        // todo: echo api details 
        $confirm = $this->confirm('Is correct, do you wish to continue? [y|N]');
        if (!$confirm) {
            // not confirmed
            return $this->error('Cancelled');
        }
        */

        return;
    }
}
