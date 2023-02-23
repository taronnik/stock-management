<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductConsumption;
use Illuminate\Support\Facades\DB;

class ProductConsumptionService
{
    public function handleProductConsumptionCreated(ProductConsumption $productConsumption): void
    {
        $product = $productConsumption->product;

        $monthlyConsumptions = ProductConsumption::query()
            ->select([
                DB::raw('sum(count) as sumByMonth'),
                DB::raw("DATE_FORMAT(start_date, '%m-%Y') as start"),
                DB::raw("DATE_FORMAT(end_date, '%m-%Y') as end")
            ])
            ->where('product_id', $productConsumption->product_id)
            ->groupBy(['start_date', 'end_date'])
            ->get();

        $product->update([
            'current_stock' => $product->current_stock - $productConsumption->count,
            'monthly_consumption' => $monthlyConsumptions->sum('sumByMonth') / $monthlyConsumptions->count() ?? 1
        ]);


    }

    public function createConsumption(array $data): ProductConsumption
    {
        $consumption = new ProductConsumption();
        $consumption->fill($data);
        $consumption->save();
        $consumption->refresh();

        return $consumption;
    }
}
