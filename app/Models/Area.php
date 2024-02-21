<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'areas';

    protected $fillable = ['thana_id', 'name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function thana(): BelongsTo
    {
        return $this->belongsTo(Thana::class, 'thana_id', 'id');
    }
}
