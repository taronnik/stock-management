<?php

namespace App\Providers;

use App\Services\ProductConsumptionService;
use Illuminate\Support\ServiceProvider;

class ProductConsumptionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(ProductConsumptionService::class, function ($app) {
            return new ProductConsumptionService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
