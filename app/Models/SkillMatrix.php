<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SkillMatrix extends Model
{
    protected $fillable = [
        'Category',
        'Skill',
        'Level',
    ];

    use HasApiTokens, HasFactory, Notifiable;
}
