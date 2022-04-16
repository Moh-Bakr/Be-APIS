<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Home extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'vision',
        'mission',
        'goal',
        'name',
        'file_path',
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
