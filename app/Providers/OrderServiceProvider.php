<?php

namespace App\Providers;

use App\Contracts\OrderContract;
use App\Contracts\OrderRepositoryContract;
use App\Repositories\OrderRepository;
use App\Services\OrderService;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(OrderContract::class, OrderService::class);
        $this->app->bind(OrderRepositoryContract::class, OrderRepository::class);
    }
}
