<?php

namespace App\Http\Resources\Api;

use App\Models\ProductConsumption;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read ProductConsumption $resource
 */
class ProductConsumptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     */
    public function toArray($request): array
    {
        return [
            'under_stock' => $this->resource->product->current_stock < $this->resource->product->minimum_stock
        ];
    }
}
