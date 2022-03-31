<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class UseCase extends Model
{
    protected $fillable = [
        'identifier','purpose','risk','type','stakeholders',
        'requirements','logic','output','volume','falsepositive',
        'priority','playbook','production','testing'
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
