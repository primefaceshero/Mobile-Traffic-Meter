<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogUseEvent extends Model
{
    protected $fillable = [
        'event',
        'user_id',
        'created_at'
    ];
}
