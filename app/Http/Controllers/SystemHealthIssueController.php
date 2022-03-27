<?php

namespace App\Http\Controllers;

use App\Models\SystemHealthIssue;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SystemHealthIssueController extends Controller
{

    public function index()
    {
        return SystemHealthIssue::get()->all();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'component' => 'required|string',
                'ip' => 'required|string',
                'Hostname' => 'required|string',
                'StartTime' => 'required|string',
                'IssueDescription' => 'required|string',
                'ActionTaken' => 'required|string',
                'NextAction' => 'required|string',
                'who' => 'required|string',
                'status' => 'required|string',
                'CloseTime' => 'required|string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $SystemHealthIssue = SystemHealthIssue::create([
            'component' => $fields['component'],
            'ip' => $fields['ip'],
            'Hostname' => $fields['Hostname'],
            'StartTime' => $fields['StartTime'],
            'IssueDescription' => $fields['IssueDescription'],
            'ActionTaken' => $fields['ActionTaken'],
            'NextAction' => $fields['NextAction'],
            'who' => $fields['who'],
            'status' => $fields['status'],
            'CloseTime' => $fields['CloseTime'],
        ]);
        $response = [
            'SystemHealthIssue' => $SystemHealthIssue,
        ];
        return response($response, 201);
    }
}
