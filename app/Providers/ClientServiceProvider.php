<?php

namespace App\Providers;

use App\Interfaces\PluggyAuthInterface;
use App\Clients\PluggyAuth;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PluggyAuthInterface::class, PluggyAuth::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}