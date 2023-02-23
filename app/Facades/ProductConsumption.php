<?php

namespace App\Facades;

use App\Services\ProductConsumptionService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static void handleProductConsumptionCreated(\App\Models\ProductConsumption $productConsumption)
 * @method static \App\Models\ProductConsumption createConsumption(array $data)
 *
 * @see ProductConsumptionService
 */
class ProductConsumption extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ProductConsumptionService::class;
    }
}
