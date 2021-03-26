<?php

namespace Akcauser\Cruder;

use Illuminate\Support\ServiceProvider;

class CruderServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'cruder');

        $this->publishes([
            __DIR__. '/config/cruder.php' => config_path('cruder.php'),
        ]);
        $this->publishes([
            __DIR__.'/assets/adminlte' => public_path('assets')
            
        ],'public');

        $this->publishes([
            __DIR__.'/resources/views' => resource_path('views/akcauser/cruder')
            
        ],'views');
    }

    public function register()
    {

    }
}
