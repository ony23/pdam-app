<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Patient extends Model
{
    use HasFactory;
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    public function treatment(): HasMany
    {
        return $this->hasMany(Treatment::class);
    }
}
