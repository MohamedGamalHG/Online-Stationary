<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $path = 'App\Repository\\';
        $this->app->bind($path.'CategoryRepositoryInterface',$path.'CategoryRepository');
        $this->app->bind($path.'ProductRepositoryInterface',$path.'ProductRepository');
        $this->app->bind($path.'FilterRepositoryInterface',$path.'FilterRepository');
        $this->app->bind($path.'SubFilterRepositoryInterface',$path.'SubFilterRepository');

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
