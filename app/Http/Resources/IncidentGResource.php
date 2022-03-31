<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IncidentGResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'IncidentIdentification' => [
                'TimeOfDetection' => $this->TimeOfDetection,
                'IncidentName' => $this->IncidentName,
                'DetectorName' => $this->DetectorName,
                'Location' => $this->Location,
                'IncidentReferenceNo' => $this->IncidentReferenceNo,
                'ContactInfo' => $this->ContactInfo,
                'RepeatedIncident' => $this->RepeatedIncident,
                'Priority' => $this->Priority,
                'ImpactDuration' => $this->ImpactDuration,
                'AffectedSystem' => $this->AffectedSystem,
            ],
            'IncidentTriage' => [
                'IncidentVerification' => $this->IncidentVerification,
                'IncidentClassification' => $this->IncidentClassification,
                'Description' => $this->Description,
            ],
            'IncidentContainment' => [
                'EvidenceAcquiring' => $this->EvidenceAcquiring,
                'DataHealth' => $this->DataHealth,
                'ContainmentMeasures' => $this->ContainmentMeasures,
                'EradicationMeasures' => $this->EradicationMeasures,
                'RecoveryMeasures' => $this->RecoveryMeasures,
            ],
            'PostIncidentActivity' => [
                'Notification' => $this->Notification,
                'CaseAnalysis' => $this->CaseAnalysis,
                'IncidentAvailability' => $this->IncidentAvailability,
            ],
            'IncidentClosure' => [
                'Improvements' => $this->Improvements,
                'TimeOfClosure' => $this->TimeOfClosure,
            ],
            'ReviewedBy' => [
                'Title' => $this->Title,
                'Signature' => $this->Signature,
                'Date' => $this->Date,
            ],

        ];
    }
}
