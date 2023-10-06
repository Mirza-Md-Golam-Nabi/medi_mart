<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'image', 'text', 'full_order', 'customer_price', 'shop_price', 'discount', 'order_date', 'delivery_date', 'status',
    ];
}
