<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Product extends Model
{
    protected $fillable=[
        'name',
        'slug',
        'description',
        'price'
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
