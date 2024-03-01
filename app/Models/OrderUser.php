<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'order_users';

    protected $fillable = ['user_id', 'address_id', 'image', 'text', 'status'];

}
