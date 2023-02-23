<?php

namespace App\Http\Controllers\Api;

use App\Facades\ProductConsumption;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductConsumptionRequest;
use App\Http\Resources\Api\ProductConsumptionResource;
use Illuminate\Http\JsonResponse;

class ProductConsumptionController extends Controller
{
    public function save(ProductConsumptionRequest $request): JsonResponse
    {
        return response()->json(
            ProductConsumptionResource::make(
                ProductConsumption::createConsumption($request->validated())
            )
        );
    }
}
