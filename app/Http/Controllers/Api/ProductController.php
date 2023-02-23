<?php

namespace App\Http\Controllers\Api;

use App\Facades\Product;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\ProductResource;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function load(): JsonResponse
    {
        return response()->json(ProductResource::collection(Product::load()));
    }
}
