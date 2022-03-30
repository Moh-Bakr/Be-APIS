<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ReportsPDF extends Model
{
    protected $fillable = [
        'name',
        'file_path'
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
