<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thana extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'thanas';

    protected $fillable = ['district_id', 'name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    public function area(): HasMany
    {
        return $this->hasMany(Area::class, 'thana_id', 'id');
    }
}
