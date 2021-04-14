<?php

return [
    'migrations_path' => 'database/migrations/',
    'controllers_path' => [
        'api' => 'app/Http/Controllers/Api/',
        'web' => 'app/Http/Controllers/'
    ],
    'models_path' => 'app/Models/',
    'repositories_path' => [
        'abstract' => 'app/Repositories/abstract/',
        'concrete' => 'app/Repositories/concrete/',
    ],
    'factories_path' => 'database/factories/',
    'seeders_path' => 'database/seeders/',
    'tests_path' => 'tests/Feature/',
    'routes_path' => [
        'api' => 'routes/api.php',
        'web' => 'routes/web.php',
    ],
    'repository_provider_path' => 'app/Providers/',
    'repository_provider_file' => 'RepositoryServiceProvider.php',
];
