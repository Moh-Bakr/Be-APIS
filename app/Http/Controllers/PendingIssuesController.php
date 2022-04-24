<?php

namespace App\Http\Controllers;

use App\Models\PendingIssues;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PendingIssuesController extends Controller
{
    public function index()
    {
        return PendingIssues::orderBy('id', 'ASC')->get();
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
            'StartTime' => $fields['StartTime'],
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

    public function update(Request $request)
    {
        $PendingIssues = PendingIssues::find($request->id);
        $PendingIssues->update($request->all());
        $response = [
            'message' => "Updated Successfully",
        ];
        return response($response, 201);
    }

    public function delete(Request $request)
    {
        $PendingIssues = PendingIssues::find($request->id);
        $PendingIssues->delete();
        $response = [
            'message' => "Deleted Successfully",
        ];
        return response($response, 201);
    }
}
