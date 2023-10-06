<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type_id', 'category_id', 'sub_category_id', 'name', 'image', 'quantity', 'base_unit', 'more_unit', 'is_active',
    ];
}
