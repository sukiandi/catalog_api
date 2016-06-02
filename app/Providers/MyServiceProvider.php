<?php

namespace App\Providers;

use App\Entity\Category;
use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\Eloquent\EloquentCategoryRepository;
use App\Repository\Eloquent\EloquentProductRepository;
use App\Repository\ProductRepository;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerProductRepository($this->app);
        $this->registerCategoryRepository($this->app);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            ProductRepository::class,
            CategoryRepository::class
        ];
    }

    /**
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    protected function registerProductRepository(Application $app)
    {
        $app->singleton(ProductRepository::class, function (Application $app)
        {
            return new EloquentProductRepository(new Product());
        });
    }

    /**
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    protected function registerCategoryRepository(Application $app)
    {
        $app->singleton(CategoryRepository::class, function (Application $app)
        {
            return new EloquentCategoryRepository(new Category());
        });
    }
}
