<?php

namespace Bgies\Laramoofront;

use Illuminate\Support\ServiceProvider;

class LaramooFrontServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       $this->loadMigrationsFrom(__DIR__.'/path/to/migrations');
       $this->loadRoutesFrom(__DIR__.'/routes/laramoofront.php');
       $this->loadViewsFrom(__DIR__.'/views', 'Laramoofront');
       

       $this->publishes([
          __DIR__.'/views' => base_path('resources/views/laramoo'),
          __DIR__.'/controllers' => base_path('app/Http/Controllers/bgies/laramoofront'),
//          __DIR__.'/controllers/courses' => base_path('app/Http/Controllers/bgies/laramoofront'),
          __DIR__.'/routes' => base_path('app/routes'),
          __DIR__.'/path/to/config/courier.php' => config_path('courier.php'),
       ]);
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
       include __DIR__.'/routes/laramoofront.php';
       $this->app->make('Bgies\Laramoofront\Controllers\Courses\CoursesController');
    }
}
