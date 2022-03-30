<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Staff extends Model
{
    protected $fillable = [
        'ParentName',
        'Name',
        'Title',
        'Email',
        'Mobile',
        'Phone',
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
