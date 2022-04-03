<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DailyHealthCheck extends Model
{
    protected $fillable = [
        'Description',
        'Status',
        'IssuesFound',
        'Component',
        'Ip',
        'Hostname',
        'StartTime',
        'IssueDescription',
        'ActionTaken',
        'NextAction',
        'Who',
        'IssueStatus',
        'CloseTime',
    ];
    use HasApiTokens, HasFactory, Notifiable;
    use HasFactory;
}
