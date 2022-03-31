<?php

namespace App\Http\Controllers;

use App\Models\IncidentG;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class IncidentGController extends Controller
{
    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'TimeOfDetection' => 'required|string',
                'IncidentName' => 'required|string',
                'DetectorName' => 'required|string',
                'ContactInfo' => 'required|string',
                'Location' => 'required|string',
                'IncidentReferenceNo' => 'required|string',
                'RepeatedIncident' => 'required|string',
                'Priority' => 'required|string',
                'AffectedSystem' => 'required|string',
                'ImpactDuration' => 'required|string',
                'IncidentVerification' => 'required|string',
                'IncidentClassification' => 'required|string',
                'Description' => 'required|string',
                'EvidenceAcquiring' => 'required|string',
                'DataHealth' => 'required|string',
                'ContainmentMeasures' => 'required|string',
                'EradicationMeasures' => 'required|string',
                'RecoveryMeasures' => 'required|string',
                'Notification' => 'required|string',
                'CaseAnalysis' => 'required|string',
                'IncidentAvailability' => 'required|string',
                'Improvements' => 'required|string',
                'TimeOfClosure' => 'required|string',
                'Title' => 'required|string',
                'Signature' => 'required|string',
                'Date' => 'required|string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        IncidentG::create([
            'TimeOfDetection' => $fields['TimeOfDetection'],
            'IncidentName' => $fields['IncidentName'],
            'DetectorName' => $fields['DetectorName'],
            'ContactInfo' => $fields['ContactInfo'],
            'Location' => $fields['Location'],
            'IncidentReferenceNo' => $fields['IncidentReferenceNo'],
            'RepeatedIncident' => $fields['RepeatedIncident'],
            'Priority' => $fields['Priority'],
            'AffectedSystem' => $fields['AffectedSystem'],
            'ImpactDuration' => $fields['ImpactDuration'],
            'IncidentVerification' => $fields['IncidentVerification'],
            'IncidentClassification' => $fields['IncidentClassification'],
            'Description' => $fields['Description'],
            'EvidenceAcquiring' => $fields['EvidenceAcquiring'],
            'DataHealth' => $fields['EvidenceAcquiring'],
            'ContainmentMeasures' => $fields['ContainmentMeasures'],
            'EradicationMeasures' => $fields['EradicationMeasures'],
            'RecoveryMeasures' => $fields['RecoveryMeasures'],
            'Notification' => $fields['Notification'],
            'CaseAnalysis' => $fields['CaseAnalysis'],
            'IncidentAvailability' => $fields['IncidentAvailability'],
            'Improvements' => $fields['Improvements'],
            'TimeOfClosure' => $fields['TimeOfClosure'],
            'Title' => $fields['Title'],
            'Signature' => $fields['Signature'],
            'Date' => $fields['Date'],
        ]);
        $response = [
            'IncidentG' => "Created Successfully",
        ];
        return response($response, 201);

    }
}
