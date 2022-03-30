<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommunicationResource extends JsonResource
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
            'Team' => $this->Team,
            'Action' => $this->Action,
            'Primary' => [
                'PrimaryEmail' => $this->PrimaryEmail,
                'PrimaryName' => $this->PrimaryName,
                'PrimaryPhone' => $this->PrimaryPhone,
            ],
            'Secondary' => [
                'SecondaryEmail' => $this->SecondaryEmail,
                'SecondaryName' => $this->SecondaryName,
                'SecondaryPhone' => $this->SecondaryPhone,
            ],

        ];
    }
}
