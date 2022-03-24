<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AdvisorySource extends Model
{
    protected $fillable = [
        'source',
        'date',
        'referenceid',
        'description',
        'applicable',
        'token',
        'notes',
    ];
    protected $casts = [
        'applicable' => 'boolean',
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
