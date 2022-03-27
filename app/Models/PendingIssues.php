<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PendingIssues extends Model
{
    protected $fillable = [
        'issue',
        'description',
        'StartTime',
        'ActionTaken',
        'NextAction',
        'who',
        'status',
        'CloseTime',
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
