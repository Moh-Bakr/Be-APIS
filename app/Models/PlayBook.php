<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PlayBook extends Model
{
    protected $fillable = [
        'title',
        'name',
        'file_path',
        'description',
        'data'
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
