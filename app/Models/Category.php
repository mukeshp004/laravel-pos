<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'uuid',
        'slug',
        'name',
        'description',
        'position',
        'show_in_menu',
        'display_mode',
        'status',
    ];
}
