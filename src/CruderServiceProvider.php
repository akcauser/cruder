<?php

namespace Akcauser\Cruder;

use Illuminate\Support\ServiceProvider;

class CruderServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/cruder.php' => config_path('cruder.php'),
            __DIR__ . '/resources/views' => resource_path('views/'),
            __DIR__ . '/routes' => 'routes'
        ]);

        $this->publishes([
            __DIR__ . '/public' => public_path(''),
        ], 'public');
    }

    public function register()
    {
    }
}
