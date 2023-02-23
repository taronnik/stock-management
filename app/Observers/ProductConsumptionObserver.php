<?php

namespace App\Observers;

use App\Models\ProductConsumption;
use App\Facades\ProductConsumption as ProductConsumptionFacade;

class ProductConsumptionObserver
{
    /**
     * Handle the ProductConsumption "created" event.
     */
    public function created(ProductConsumption $productConsumption): void
    {
        ProductConsumptionFacade::handleProductConsumptionCreated($productConsumption);
    }
}
