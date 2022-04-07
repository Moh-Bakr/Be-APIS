<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Shifts extends Model
{
    protected $fillable = [
        'shifts',
    ];

    use HasApiTokens, HasFactory, Notifiable;
}
