<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Communication extends Model
{
    protected $fillable = [
        'Team',
        'Action',
        'PrimaryEmail',
        'PrimaryName',
        'PrimaryPhone',
        'SecondaryEmail',
        'SecondaryName',
        'SecondaryPhone',
        'PrimaryMobile',
        'SecondaryMobile',
        'GroupEmail',
        'GroupManager',
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
