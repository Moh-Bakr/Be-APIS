<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ALerts extends Model
{
    protected $fillable = [
        'number',
        'name',
        'StartTime',
        'description',
        'ActionTaken',
        'NextAction',
        'who',
        'status',
        'CloseTime',
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
