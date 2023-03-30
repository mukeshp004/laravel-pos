<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        'cost',
        'mrp',
        'price',
        'discount',
        'discount_percentage',
        'created_by',
        'updated_by',
    ];

    /**
     * Get the purchase that owns the item.
     */
    // public function purchase(): BelongsTo
    // {
    //     return $this->belongsTo(Purchase::class);
    // }
}
