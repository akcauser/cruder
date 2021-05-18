<?php

return [
    /**
     * Default Migrations files path
     */
    'migrations_path' => 'database/migrations/',
    'factories_path' => 'database/factories/',
    'seeders_path' => 'database/seeders/',
    'tests_path' => 'tests/Feature/',

    /**
     * Controllers default path
     */
    'controllers_path' => [
        'api' => 'app/Http/Controllers/API/',
        'cms' => 'app/Http/Controllers/CMS/'
    ],

    /**
     * Model Default Path
     */
    'models_path' => 'app/Models/',

    /** 2 Tier Layered Architecture */
    'service_paths' => [
        'abstract' => 'app/Cruder/Service/Abstract/',
        'concrete' => 'app/Cruder/Service/Concrete/',
    ],
    'dataservice_paths' => [
        'abstract' => 'app/Cruder/DataService/Abstract/',
        'concrete' => 'app/Cruder/DataService/Concrete/',
    ],

    /**
     * Route Filed 
     */
    'routes' => [
        'folder' => 'routes/',
        'api_file' => 'api.php',
        'cms_file' => 'cms.php',
    ],

    'providers_path' => 'app/Providers/',

    /**
     * Primary Key Field Feature Default Settings
     * You can change default primary key field.
     */
    'pk_field' => "id",

    /**
     * Default Timestamps Fields
     * If true, timestamp fields adding as default
     * Options: true|false
     */
    'timestamps' => true,

    /**
     * Softdelete is not exist when default config. 
     * You can change through this config. True Or False
     */
    'softdelete' => false,

    'prefix' => [
        'api' => 'API',
        'cms' => 'CMS',
    ]
];
