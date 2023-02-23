<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 * @property string $name
 * @property int $current_stock
 * @property int $minimum_stock
 * @property float $monthly_consumption
 */
class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['current_stock', 'monthly_consumption'];
}
