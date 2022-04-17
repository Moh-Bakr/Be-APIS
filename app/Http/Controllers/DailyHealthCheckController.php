<?php

namespace App\Http\Controllers;

use App\Models\DailyHealthCheck;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DailyHealthCheckController extends Controller
{
    public function index()
    {
        return DailyHealthCheck::orderBy('id', 'ASC')->get();
    }

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
        $response = [
            'DailyHealthCheck' => "Created Successfully",
        ];
        return response($response, 201);
    }

    public function update(Request $request)
    {
        $DailyHealthCheck = DailyHealthCheck::find($request->id);
        $DailyHealthCheck->update($request->all());
        $response = [
            'message' => "Updated Successfully",
        ];
        return response($response, 201);
    }

    public function delete(Request $request)
    {
        $DailyHealthCheck = DailyHealthCheck::find($request->id);
        $DailyHealthCheck->delete();
        $response = [
            'message' => "Deleted Successfully",
        ];
        return response($response, 201);
    }
}
