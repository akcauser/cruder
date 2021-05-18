<?php

namespace Akcauser\Cruder\Commands;

use Akcauser\Cruder\Generator\Main\MainGenerator;
use Akcauser\Cruder\Generator\MigrationGenerator;
use Akcauser\Cruder\Utils\FieldUtil;
use Illuminate\Console\Command;

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

        new MainGenerator($modelName, $tableName, $fields, $softDelete, $primaryKey, $timestamps, $forceMigrate);

        $this->info('Completed!');

        return;
    }
}
