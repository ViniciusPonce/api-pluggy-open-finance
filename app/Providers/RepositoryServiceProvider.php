<?php

namespace App\Providers;

use App\Interfaces\AccountRepositoryInterface;
use App\Interfaces\PluggyItemInterface;
use App\Interfaces\PluggyItemRepositoryInterface;
use App\Repositories\PluggyItemRepository;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\AccountRepository;
use App\Repositories\UserRepository;
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
        $this->app->bind(PluggyItemInterface::class, PluggyItemRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(PluggyItemRepositoryInterface::class, PluggyItemRepository::class);
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
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