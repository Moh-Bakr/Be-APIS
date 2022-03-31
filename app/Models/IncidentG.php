<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class IncidentG extends Model
{
    protected $fillable = [
        'TimeOfDetection',
        'IncidentName',
        'DetectorName',
        'ContactInfo',
        'Location',
        'IncidentReferenceNo',
        'RepeatedIncident',
        'Priority',
        'ImpactDuration',
        'AffectedSystem',
        'IncidentVerification',
        'IncidentClassification',
        'Description',
        'EvidenceAcquiring',
        'DataHealth',
        'ContainmentMeasures',
        'EradicationMeasures',
        'RecoveryMeasures',
        'Notification',
        'CaseAnalysis',
        'IncidentAvailability',
        'Improvements',
        'TimeOfClosure',
        'Title',
        'Signature',
        'Date',
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
