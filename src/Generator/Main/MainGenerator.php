<?php

namespace Akcauser\Cruder\Generator\Main;

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

    public function __construct($modelName, $tableName, $fields, $softDelete, $primaryKey, $timestamps, $forceMigrate)
    {
        $this->modelName = $modelName;
        $this->tableName = $tableName;
        $this->fields = $fields;
        $this->softDelete = $softDelete;
        $this->primaryKey = $primaryKey;
        $this->timestamps = $timestamps;
        $this->forceMigrate = $forceMigrate;
        $this->call();
    }

    private function call()
    {
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
        new DataServiceConcreteGenerator($this->modelName, $this->fields);
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

        // Store to File

        // pagination
        // swagger 
        // Datatables

        if ($this->forceMigrate) {
            Artisan::call('migrate');
        }
    }
}
