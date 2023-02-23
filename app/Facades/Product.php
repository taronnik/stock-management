<?php

namespace App\Facades;

use App\Services\ProductService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection load()
 *
 * @see ProductService
 */
class Product extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ProductService::class;
    }
}
