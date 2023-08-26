<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengguna extends Model
{
    use HasFactory;
    public function airku(): HasMany
    {
        return $this->hasMany(Airku::class);
    }
}
