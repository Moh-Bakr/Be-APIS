<?php

namespace App\Http\Controllers;

use App\Models\UseCase;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UseCaseController extends Controller
{
    public function index()
    {
        return UseCase::orderBy('id', 'ASC')->get();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'identifier' => 'required|string',
                'purpose' => 'required|string',
                'risk' => 'required|string',
                'type' => 'required|string',
                'stakeholders' => 'required|string',
                'requirements' => 'required|string',
                'logic' => 'required|string',
                'output' => 'required|string',
                'volume' => 'required|string',
                'falsepositive' => 'required|string',
                'priority' => 'required|string',
                'playbook' => 'required|string',
                'production' => 'required|string',
                'testing' => 'required|string',
                'tactics' => '',
                'techniques' => '',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $use_cases = UseCase::create([
            'identifier' => $fields['identifier'],
            'purpose' => $fields['purpose'],
            'risk' => $fields['risk'],
            'type' => $fields['type'],
            'stakeholders' => $fields['stakeholders'],
            'requirements' => $fields['requirements'],
            'output' => $fields['output'],
            'volume' => $fields['volume'],
            'falsepositive' => $fields['falsepositive'],
            'logic' => $fields['logic'],
            'priority' => $fields['priority'],
            'playbook' => $fields['playbook'],
            'production' => $fields['production'],
            'testing' => $fields['testing'],
            'tactics' => $fields['tactics'] ?? null,
            'techniques' => $fields['techniques'] ?? null,
        ]);
        $response = [
            'use_cases' => $use_cases,
        ];
        return response($response, 201);
    }

    public function update(Request $request)
    {
        $UseCase = UseCase::find($request->id);
        $UseCase->update($request->all());
        $response = [
            'message' => "Updated Successfully",
        ];
        return response($response, 201);
    }

    public function delete(Request $request)
    {
        $UseCase = UseCase::find($request->id);
        $UseCase->delete();
        $response = [
            'message' => "Deleted Successfully",
        ];
        return response($response, 201);
    }
}
