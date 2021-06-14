<?php

namespace Encodeurs\Cruder\Generator\Main;

use Encodeurs\Cruder\Generator\Controller\{ApiControllerGenerator, CmsControllerGenerator};
use Encodeurs\Cruder\Generator\Routes\ApiRouteGenerator;
use Encodeurs\Cruder\Generator\Schema\SchemaJsonGenerator;
use Encodeurs\Cruder\Generator\Routes\CmsRouteGenerator;
use Encodeurs\Cruder\Generator\DataService\{DataServiceAbstractGenerator, DataServiceConcreteGenerator, DataServiceProviderGenerator};
use Encodeurs\Cruder\Generator\Test\TestGenerator;
use Encodeurs\Cruder\Generator\HTML\CreatePageGenerator;
use Encodeurs\Cruder\Generator\HTML\EditPageGenerator;
use Encodeurs\Cruder\Generator\HTML\FieldsGenerator;
use Encodeurs\Cruder\Generator\HTML\IndexPageGenerator;
use Encodeurs\Cruder\Generator\HTML\ShowFieldsGenerator;
use Encodeurs\Cruder\Generator\HTML\ShowPageGenerator;
use Encodeurs\Cruder\Generator\HTML\SidebarMenuItemGenerator;
use Encodeurs\Cruder\Generator\HTML\TableTdsGenerator;
use Encodeurs\Cruder\Generator\HTML\TableThsGenerator;
use Encodeurs\Cruder\Generator\Model\ModelGenerator;
use Encodeurs\Cruder\Generator\Database\{SeederGenerator, MigrationGenerator, FactoryGenerator};
use Encodeurs\Cruder\Generator\Service\{ServiceAbstractGenerator, ServiceConcreteGenerator, ServiceProviderGenerator};
use Encodeurs\Cruder\Generator\Request\{StoreRequestGenerator, UpdateRequestGenerator};
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
    private $relationFields;
    private $swagger;

    public function __construct($modelName, $tableName, $fields, $softDelete, $primaryKey, $timestamps, $forceMigrate, $paginate = 15, $relationFields = [], $swagger = true)
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
        $this->relationFields = $relationFields;
        $this->swagger = $swagger;
    }

    public function call()
    {
        try {
            // Generate Migration 
            new MigrationGenerator($this->modelName, $this->tableName, $this->fields, $this->softDelete, $this->primaryKey, $this->timestamps, $this->relationFields);

            // Generate Model 
            new ModelGenerator($this->modelName, $this->fields, $this->softDelete, $this->tableName, $this->relationFields, $this->timestamps, $this->swagger);

            // Generate Factory
            new FactoryGenerator($this->modelName, $this->fields, $this->relationFields);

            // Generate Seeder
            new SeederGenerator($this->modelName);

            // Generate Api Controller
            new ApiControllerGenerator($this->modelName, $this->swagger);

            // Generate Web Controller
            new CmsControllerGenerator($this->modelName);

            // Generate Service
            new ServiceAbstractGenerator($this->modelName);
            new ServiceConcreteGenerator($this->modelName);
            new ServiceProviderGenerator($this->modelName);

            // DataService Generator
            new DataServiceAbstractGenerator($this->modelName);
            new DataServiceConcreteGenerator($this->modelName, $this->fields, $this->paginate, $this->relationFields);
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
            new FieldsGenerator($this->modelName, $this->fields, $this->relationFields);
            new ShowFieldsGenerator($this->modelName, $this->fields);
            new TableThsGenerator($this->modelName, $this->fields);
            new TableTdsGenerator($this->modelName, $this->fields, $this->primaryKey);
            new SchemaJsonGenerator($this->modelName, $this->fields, $this->paginate, $this->softDelete, $this->forceMigrate, $this->timestamps, $this->tableName, $this->relationFields);
            // Store to File

            // swagger 
            // Datatables ??

            if ($this->forceMigrate) {
                Artisan::call('migrate');
            }

            if ($this->swagger) {
                Artisan::call('l5-swagger:generate');
            }

            return true;
        } catch (\Throwable $th) {
            throw $th;
            return false;;
        }
    }
}
