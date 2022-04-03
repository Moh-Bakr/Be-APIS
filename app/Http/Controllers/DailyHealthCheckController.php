<?php

namespace App\Http\Controllers;

use App\Models\DailyHealthCheck;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DailyHealthCheckController extends Controller
{
//    public function index()
//    {
//        return DailyHealthCheck::get()->all();
//    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'Description' => 'required|string',
                'Status' => 'required|string',
                'IssuesFound' => '',
                'Component' => '',
                'Ip' => '',
                'Hostname' => '',
                'StartTime' => '',
                'IssueDescription' => '',
                'ActionTaken' => '',
                'NextAction' => '',
                'Who' => '',
                'IssueStatus' => '',
                'CloseTime' => '',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        DailyHealthCheck::create([
            'Description' => $fields['Description'],
            'Status' => $fields['Status'],
            'IssuesFound' => $fields['IssuesFound'] ?? NULL,
            'Component' => $fields['Component'] ?? NULL,
            'Ip' => $fields['Ip'] ?? NULL,
            'Hostname' => $fields['Hostname'] ?? NULL,
            'StartTime' => $fields['StartTime'] ?? NULL,
            'IssueDescription' => $fields['IssueDescription'] ?? NULL,
            'ActionTaken' => $fields['ActionTaken'] ?? NULL,
            'NextAction' => $fields['NextAction'] ?? NULL,
            'Who' => $fields['Who'] ?? NULL,
            'IssueStatus' => $fields['IssueStatus'] ?? NULL,
            'CloseTime' => $fields['CloseTime'] ?? NULL,
        ]);
//        $response = [
//            'HealthCheck' => $HealthCheck,
//        ];
        return response('Created Successfully', 201);
    }
}
