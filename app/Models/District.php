<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';

    protected $fillable = ['division_id', 'name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function thanas(): HasMany
    {
        return $this->hasMany(Thana::class, 'district_id', 'id');
    }
}
