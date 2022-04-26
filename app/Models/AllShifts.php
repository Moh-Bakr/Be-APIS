<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AllShifts extends Model
{
    protected $fillable = [
        'name',
        'mode',
        'color',
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
