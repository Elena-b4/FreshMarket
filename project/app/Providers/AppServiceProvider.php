<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\ManufactureRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\ManufactureRepository;
use App\Repositories\ProductRepository;
use App\Repositories\UserRepository;
use App\Services\FilterServices\Contracts\FilterServiceInterface;
use App\Services\FilterServices\FilterService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        CategoryRepositoryInterface::class => CategoryRepository::class,
        ProductRepositoryInterface::class => ProductRepository::class,
        ManufactureRepositoryInterface::class => ManufactureRepository::class,
        FilterServiceInterface::class => FilterService::class,
        UserRepositoryInterface::class => UserRepository::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
