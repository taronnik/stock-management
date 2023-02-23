<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductConsumption;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function load(): Collection
    {
        return Product::query()->limit(100)->get();
    }
}
