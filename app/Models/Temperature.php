<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Temperature extends Model
{
    use HasFactory;

    protected $fillable = ['value'];

    public function sensor(): BelongsTo
    {
        return $this->belongsTo(Sensor::class);
    }
}
