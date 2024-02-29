<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sub_categories';

    protected $fillable = ['type_id', 'category_id', 'title'];

    protected $hidden = ['created_at', 'updated_at'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
