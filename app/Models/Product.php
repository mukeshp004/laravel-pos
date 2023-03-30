<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'slug',
        'name',
        'sku',
        'type',
        'description',
        'url_key',
        'is_new',
        'quantity',
        'cost',
        'mrp',
        'price',
        'size',
        'color',
        'status',
    ];

    static $status = [
        'Inactive' => 0,
        'Active' => 1,
    ];
}
