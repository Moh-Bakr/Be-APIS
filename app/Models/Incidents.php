<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Incidents extends Model
{
    protected $fillable = [
        'date',
        'name',
        'number',
        'description',
        'ActionTaken',
        'NextAction',
        'who',
        'status',
        'CloseTime',
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
