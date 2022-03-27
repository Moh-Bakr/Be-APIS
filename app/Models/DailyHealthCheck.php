<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DailyHealthCheck extends Model
{
    protected $fillable = [
        'description',
        'status',
        'issuesfound',
    ];
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;
}
