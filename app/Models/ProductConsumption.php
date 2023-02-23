<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property-read int $id
 * @property int $product_id
 * @property int $count
 * @property Carbon $start_date
 * @property Carbon $end_date
 *
 * @property-read Product $product
 */
class ProductConsumption extends Model
{
    protected $dates = ['start_date', 'end_date'];

    protected $fillable = ['product_id', 'count', 'start_date', 'end_date'];

    public $timestamps = false;

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
