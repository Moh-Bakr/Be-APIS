<?php

namespace App\Http\Controllers;

use App\Models\AdvisorySource;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdvisorySourceController extends Controller
{
    public function index()
    {
        return AdvisorySource::orderBy('id', 'ASC')->get();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'source' => 'required|string',
                'date' => 'required|string',
                'referenceid' => 'required|string',
                'description' => 'required|string',
                'applicable' => 'required|string',
                'token' => '',
                'notes' => 'required|string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $AdvisorySource = AdvisorySource::create([
            'source' => $fields['source'],
            'date' => $fields['date'],
            'referenceid' => $fields['referenceid'],
            'description' => $fields['description'],
            'applicable' => $fields['applicable'],
            'token' => $fields['token'] ?? NULL,
            'notes' => $fields['notes'],
        ]);
        $response = [
            'AdvisorySource' => $AdvisorySource,
        ];
        return response($response, 201);
    }

    public function update(Request $request)
    {
        $AdvisorySource = AdvisorySource::find($request->id);
        $AdvisorySource->update($request->all());
        $response = [
            'message' => "Updated Successfully",
        ];
        return response($response, 201);
    }

    public function delete(Request $request)
    {
        $AdvisorySource = AdvisorySource::find($request->id);
        $AdvisorySource->delete();
        $response = [
            'message' => "Deleted Successfully",
        ];
        return response($response, 201);
    }


}
