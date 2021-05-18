<?php

namespace Akcauser\Cruder\Commands;

use Akcauser\Cruder\Generator\Controller\ApiControllerGenerator;
use Akcauser\Cruder\Generator\Routes\ApiRouteGenerator;
use Akcauser\Cruder\Generator\Controller\CmsControllerGenerator;
use Akcauser\Cruder\Generator\Routes\CmsRouteGenerator;
use Akcauser\Cruder\Generator\DataServiceAbstractGenerator;
use Akcauser\Cruder\Generator\DataServiceConcreteGenerator;
use Akcauser\Cruder\Generator\DataServiceProviderGenerator;
use Akcauser\Cruder\Generator\TestGenerator;
use Akcauser\Cruder\Generator\Database\FactoryGenerator;
use Akcauser\Cruder\Generator\HTML\CreatePageGenerator;
use Akcauser\Cruder\Generator\HTML\EditPageGenerator;
use Akcauser\Cruder\Generator\HTML\FieldsGenerator;
use Akcauser\Cruder\Generator\HTML\IndexPageGenerator;
use Akcauser\Cruder\Generator\HTML\ShowFieldsGenerator;
use Akcauser\Cruder\Generator\HTML\ShowPageGenerator;
use Akcauser\Cruder\Generator\HTML\SidebarMenuItemGenerator;
use Akcauser\Cruder\Generator\HTML\TableTdsGenerator;
use Akcauser\Cruder\Generator\HTML\TableThsGenerator;
use Akcauser\Cruder\Generator\MigrationGenerator;
use Akcauser\Cruder\Generator\ModelGenerator;
use Akcauser\Cruder\Generator\Database\SeederGenerator;
use Akcauser\Cruder\Generator\ServiceAbstractGenerator;
use Akcauser\Cruder\Generator\ServiceConcreteGenerator;
use Akcauser\Cruder\Generator\ServiceProviderGenerator;
use Akcauser\Cruder\Generator\Request\StoreRequestGenerator;
use Akcauser\Cruder\Generator\Request\UpdateRequestGenerator;
use Akcauser\Cruder\Utils\FieldUtil;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

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
        $softDelete = $this->confirm("Do you want to Softdelete Feature? [Y|n]", true) ? true : false;

        // Ask For Custom Primary Key Name 
        $primaryKey = $this->ask("Do you want to custom primary key field? Enter if you want:", "id");

        // Ask Timestamp Use
        $timestamps = $this->confirm("Do you want to use Timestamps Feature? [Y|n]", true) ? true : false;

        // Ask Timestamp Use
        $forceMigrate = $this->confirm("Do you want to use force migrate this migration? [y|N]", false) ? true : false;

        // Kullanıcının girdiği değerler ekrana çıktı olarak verilir. Kullanıcı değerleri kontrol edip onayladıktan sonra api oluşturulur.
        $this->info('***** Api Details *****');
        $this->line('Table Name= ' . $tableName);
        $this->line('Soft Delete= ' . ($softDelete ? 'Yes' : 'No'));
        $this->line('Primary Key= ' . $primaryKey);
        $this->line('Timestamps= ' . ($timestamps ? 'Yes' : 'No'));
        $this->line('Force Migrate= ' . ($forceMigrate ? 'Yes' : 'No'));
        $this->warn('Fields:');
        foreach ($fields as $field) {
            $this->line("Field name: " . $field["name"]);
            $this->line("Database Type: " . $field['dbtype']);
            $this->line("HTML Type: " . $field['htmltype']);
            $this->line("Validation Rules: " . $field['validations']);
            $this->line("-------");
        }

        $this->line("\n");
        $confirm = $this->confirm('Is correct, do you wish to continue? [Y|n]', true);
        if (!$confirm) {
            return $this->error('Cancelled');
        }

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
        new CmsControllerGenerator($modelName);

        // Generate Service
        new ServiceAbstractGenerator($modelName);
        new ServiceConcreteGenerator($modelName, $fields);
        new ServiceProviderGenerator($modelName);

        // DataService Generator
        new DataServiceAbstractGenerator($modelName);
        new DataServiceConcreteGenerator($modelName, $fields);
        new DataServiceProviderGenerator($modelName);

        // Generate Test
        new TestGenerator($modelName, $fields, $tableName);

        // Request Generator
        new StoreRequestGenerator($modelName);
        new UpdateRequestGenerator($modelName);

        // Add Api Routes
        new ApiRouteGenerator($modelName);
        new CmsRouteGenerator($modelName);

        // Add Pages
        new IndexPageGenerator($modelName);
        new ShowPageGenerator($modelName);
        new CreatePageGenerator($modelName);
        new EditPageGenerator($modelName);
        new SidebarMenuItemGenerator($modelName);
        new FieldsGenerator($modelName, $fields);
        new ShowFieldsGenerator($modelName, $fields);
        new TableThsGenerator($modelName, $fields);
        new TableTdsGenerator($modelName, $fields, $primaryKey);

        // Store to File

        // Get Model Features
        // pagination
        // swagger 
        // Datatables


        if ($forceMigrate) {
            Artisan::call('migrate');
        }

        $this->info('Completed!');

        return;
    }
}
