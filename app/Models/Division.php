<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    use HasFactory;

    protected $table = 'divisions';

    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function district(): HasMany
    {
        return $this->hasMany(District::class, 'division_id', 'id');
    }
}
