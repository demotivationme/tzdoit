<?php

namespace App\Providers;

use App\Managers\FilesystemManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('filesystem', function () {
            return new FilesystemManager($this->app);
        });
    }
}
