<?php

namespace Encodeurs\Cruder\Generator\Main;

use Encodeurs\Cruder\Generator\Controller\ApiControllerGenerator;
use Encodeurs\Cruder\Generator\Routes\ApiRouteGenerator;
use Encodeurs\Cruder\Generator\Controller\CmsControllerGenerator;
use Encodeurs\Cruder\Generator\Schema\SchemaJsonGenerator;
use Encodeurs\Cruder\Generator\Routes\CmsRouteGenerator;
use Encodeurs\Cruder\Generator\DataServiceAbstractGenerator;
use Encodeurs\Cruder\Generator\DataServiceConcreteGenerator;
use Encodeurs\Cruder\Generator\DataServiceProviderGenerator;
use Encodeurs\Cruder\Generator\TestGenerator;
use Encodeurs\Cruder\Generator\Database\FactoryGenerator;
use Encodeurs\Cruder\Generator\HTML\CreatePageGenerator;
use Encodeurs\Cruder\Generator\HTML\EditPageGenerator;
use Encodeurs\Cruder\Generator\HTML\FieldsGenerator;
use Encodeurs\Cruder\Generator\HTML\IndexPageGenerator;
use Encodeurs\Cruder\Generator\HTML\ShowFieldsGenerator;
use Encodeurs\Cruder\Generator\HTML\ShowPageGenerator;
use Encodeurs\Cruder\Generator\HTML\SidebarMenuItemGenerator;
use Encodeurs\Cruder\Generator\HTML\TableTdsGenerator;
use Encodeurs\Cruder\Generator\HTML\TableThsGenerator;
use Encodeurs\Cruder\Generator\MigrationGenerator;
use Encodeurs\Cruder\Generator\ModelGenerator;
use Encodeurs\Cruder\Generator\Database\SeederGenerator;
use Encodeurs\Cruder\Generator\ServiceAbstractGenerator;
use Encodeurs\Cruder\Generator\ServiceConcreteGenerator;
use Encodeurs\Cruder\Generator\ServiceProviderGenerator;
use Encodeurs\Cruder\Generator\Request\StoreRequestGenerator;
use Encodeurs\Cruder\Generator\Request\UpdateRequestGenerator;
use Encodeurs\Cruder\Utils\DatabaseUtil;
use Illuminate\Support\Facades\Artisan;

class MainGenerator
{
    private $modelName;
    private $tableName;
    private $fields;
    private $softDelete;
    private $primaryKey;
    private $timestamps;
    private $forceMigrate;
    private $paginate;

    public function __construct($modelName, $tableName, $fields, $softDelete, $primaryKey, $timestamps, $forceMigrate, $paginate = 15)
    {
        $this->modelName = $modelName;

        // Generate Table Name
        if ($tableName)
            $this->tableName = $tableName;
        else
            $this->tableName = DatabaseUtil::generateTableName($modelName);


        $this->fields = $fields;
        $this->softDelete = $softDelete;
        $this->primaryKey = $primaryKey;
        $this->timestamps = $timestamps;
        $this->forceMigrate = $forceMigrate;
        $this->paginate = $paginate;
    }

    public function call()
    {
        try {
            // Generate Migration 
            new MigrationGenerator($this->modelName, $this->tableName, $this->fields, $this->softDelete, $this->primaryKey, $this->timestamps);

            // Generate Model 
            new ModelGenerator($this->modelName, $this->fields, $this->softDelete, $this->tableName);

            // Generate Factory
            new FactoryGenerator($this->modelName, $this->fields);

            // Generate Seeder
            new SeederGenerator($this->modelName);

            // Generate Api Controller
            new ApiControllerGenerator($this->modelName);

            // Generate Web Controller
            new CmsControllerGenerator($this->modelName);

            // Generate Service
            new ServiceAbstractGenerator($this->modelName);
            new ServiceConcreteGenerator($this->modelName, $this->fields);
            new ServiceProviderGenerator($this->modelName);

            // DataService Generator
            new DataServiceAbstractGenerator($this->modelName);
            new DataServiceConcreteGenerator($this->modelName, $this->fields, $this->paginate);
            new DataServiceProviderGenerator($this->modelName);

            // Generate Test
            new TestGenerator($this->modelName, $this->fields, $this->tableName, $this->softDelete);

            // Request Generator
            new StoreRequestGenerator($this->modelName);
            new UpdateRequestGenerator($this->modelName);

            // Add Api Routes
            new ApiRouteGenerator($this->modelName);
            new CmsRouteGenerator($this->modelName);

            // Add Pages
            new IndexPageGenerator($this->modelName);
            new ShowPageGenerator($this->modelName);
            new CreatePageGenerator($this->modelName);
            new EditPageGenerator($this->modelName);
            new SidebarMenuItemGenerator($this->modelName);
            new FieldsGenerator($this->modelName, $this->fields);
            new ShowFieldsGenerator($this->modelName, $this->fields);
            new TableThsGenerator($this->modelName, $this->fields);
            new TableTdsGenerator($this->modelName, $this->fields, $this->primaryKey);
            new SchemaJsonGenerator($this->modelName, $this->fields, $this->paginate, $this->softDelete, $this->forceMigrate, $this->timestamps, $this->tableName);
            // Store to File

            // pagination
            // swagger 
            // Datatables

            if ($this->forceMigrate) {
                Artisan::call('migrate:fresh --seed');
            }

            return true;
        } catch (\Throwable $th) {
            throw $th;
            return false;;
        }
    }
}
