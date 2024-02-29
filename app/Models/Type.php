<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'types';

    protected $fillable = ['title'];

    protected $hidden = ['created_at', 'updated_at'];

    public function category(): HasMany
    {
        return $this->hasMany(Category::class, 'type_id', 'id');
    }

    public function sub_category(): HasMany
    {
        return $this->hasMany(SubCategory::class, 'type_id', 'id');
    }
}
