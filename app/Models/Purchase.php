<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Purchase extends Model
{
    use HasFactory;


    protected $fillable = [
        'quantity',
        'sub_total',
        'tax',
        'total',
        'profit',
        'client_id',
        'supplier_id',
        'created_by',
        'updated_by',
    ];


    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['items'];


    public function items(): HasMany
    {
        return $this->hasMany(PurchaseItem::class);
    }

    /**item
     * Get the supplier that owns the purchase.
     */
    // public function supplier(): BelongsTo
    // {
    //     // return $this->belongsTo('App\Supplier');
    // }
}
