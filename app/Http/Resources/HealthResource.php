<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HealthResource extends JsonResource
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
            'HealthCheck' => [
                'Description' => $this->Description,
                'Status' => $this->Status,
                'IssuesFound' => $this->IssuesFound,
            ],
            'HealthIssue' => [
                'Component' => $this->Component,
                'Ip' => $this->Ip,
                'Hostname' => $this->Hostname,
                'StartTime' => $this->StartTime,
                'IssueDescription' => $this->IssueDescription,
                'ActionTaken' => $this->ActionTaken,
                'NextAction' => $this->NextAction,
                'Who' => $this->Who,
                'IssueStatus' => $this->IssueStatus,
                'CloseTime' => $this->CloseTime,
            ],

        ];
    }
}
