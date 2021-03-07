<?php

namespace Cruder;

use Illuminate\Support\ServiceProvider;

class CruderServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->publishes([
            __DIR__. '/../config/cruder.php' => config_path('cruder.php'),
        ]);
    }

    public function register()
    {

    }
}
