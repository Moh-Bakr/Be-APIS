<?php

namespace App\Http\Controllers;

use App\Models\AdvisorySource;
use Illuminate\Http\Request;

class AdvisorySourceController extends Controller
{
    public function index()
    {
        return AdvisorySource::get()->all();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'source' => 'required|string',
                'date' => 'required|string',
                'referenceid' => 'required|string',
                'description' => 'required|string',
                'applicable' => 'required|boolean',
                'token' => 'required|string',
                'notes' => 'required|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {
            return $th->validator->errors();
        }
        $AdvisorySource = AdvisorySource::create([
            'source' => $fields['source'],
            'date' => $fields['date'],
            'referenceid' => $fields['referenceid'],
            'description' => $fields['description'],
            'applicable' => $fields['applicable'],
            'token' => $fields['token'],
            'notes' => $fields['notes'],
        ]);
        $response = [
            'AdvisorySource' => $AdvisorySource,
        ];
        return response($response, 201);
    }


}
