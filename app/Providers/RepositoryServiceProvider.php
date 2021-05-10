<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Application\Repository\CategoryRepositoryInterface;
use Src\Application\Repository\Eloquent\BaseRepository;
use Src\Application\Repository\Eloquent\CategoryRepository;
use Src\Application\Repository\Eloquent\ProductRepository;
use Src\Application\Repository\EloquentRepositoryInterface;
use Src\Application\Repository\ProductRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
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
