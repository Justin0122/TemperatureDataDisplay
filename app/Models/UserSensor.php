<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSensor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'table_id', 'sensor_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
