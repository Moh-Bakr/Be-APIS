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
        'phone',
        'email',
        'subtitle',
        'vision',
        'mission',
        'goal',
        'name',
        'file_path',
        'url',
        'background_name',
        'background_path',
        'background_url',
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
