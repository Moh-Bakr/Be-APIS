<?php

namespace App\Http\Controllers;

use App\Models\PendingIssues;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PendingIssuesController extends Controller
{
    public function index()
    {
        return PendingIssues::get()->all();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'issue' => 'required|string',
                'description' => 'required|string',
                'StartTime' => 'required|string',
                'ActionTaken' => 'required|string',
                'NextAction' => 'required|string',
                'who' => 'required|string',
                'status' => 'required|string',
                'CloseTime' => 'required|string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $PendingIssues = PendingIssues::create([
            'issue' => $fields['issue'],
            'description' => $fields['description'],
            'StartTime' => $fields['description'],
            'ActionTaken' => $fields['ActionTaken'],
            'NextAction' => $fields['NextAction'],
            'who' => $fields['who'],
            'status' => $fields['status'],
            'CloseTime' => $fields['CloseTime'],
        ]);
        $response = [
            'PendingIssues' => $PendingIssues,
        ];
        return response($response, 201);
    }
}
