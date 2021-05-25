<?php

return [

    'api_prefix' => 'API',
    'cms_prefix' => 'CMS',

    'api_route' => 'api.php',
    'web_route' => 'web.php',

    'path' => [
        'migration' => database_path('migrations/'),
        'factory' => database_path('factories/'),
        'seeder' => database_path('seeders/'),
        'test' => base_path('tests/Feature/'),
        'controller' => app_path('Http/Controllers/'),
        'request' => app_path('Http/Requests/'),
        'model' => app_path('Models/'),
        'provider' => app_path('Providers/'),
        'route' => base_path('routes/'),
        /** 2 Tier Layered Architecture Paths - Dependency Injection*/
        'service' => app_path('Cruder/Service/'),
        'data_service' => app_path('Cruder/DataService/'),
        'schema' => resource_path('cruder_schemas/'),
        'view' => resource_path('views/'),
    ],

    'namespace' => [
        'factory' => 'Database\Factories',
        'seeder' => 'Database\Seeders',
        'tests' => 'Tests\Feature',
        'controller' => 'App\Http\Controller',
        'request' => 'App\Http\Requests',
        'model' => 'App\Models',
        'provider' => 'App\Providers',
        /** 2 Tier Layered Architecture Paths - Dependency Injection*/
        'service' => 'App\Cruder\Service',
        'data_service' => 'App\Cruder\DataService',
    ],

    'database' => [
        /**
         * Primary Key Field Feature Default Settings
         * You can change default primary key field.
         */
        'default_primary_key' => 'id',
        /**
         * Default Timestamps Fields
         * If true, timestamp fields adding as default
         * Options: true|false
         */
        'timestamps' => true,
        /**
         * Softdelete is not exist when default config. 
         * You can change. True Or False
         */
        'softdelete' => false,
    ],
];
