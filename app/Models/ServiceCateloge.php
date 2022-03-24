<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ServiceCateloge extends Model
{
    protected $fillable = [
        'name',
        'owner',
        'description',
        'status',
        'hours',
        'inputs',
        'outputs',
        'consumers',
        'processes',
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
