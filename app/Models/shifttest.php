<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class shifttest extends Model
{
    protected $fillable = [
        'month',
        'name',
        'shifts',
    ];

    use HasApiTokens, HasFactory, Notifiable;
}
