<?php

namespace App\Http\Controllers;

use App\Models\Communication;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CommunicationController extends Controller
{
    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'Team' => 'required|string',
                'Action' => 'required|string',
                'PrimaryEmail' => '',
                'PrimaryName' => '',
                'PrimaryPhone' => '',
                'SecondaryEmail' => '',
                'SecondaryName' => '',
                'SecondaryPhone' => '',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $Communication = Communication::create([
            'Team' => $fields['Team'],
            'Action' => $fields['Action'],
            'PrimaryEmail' => $fields['PrimaryEmail'] ?? NULL,
            'PrimaryName' => $fields['PrimaryName'] ?? NULL,
            'PrimaryPhone' => $fields['PrimaryPhone'] ?? NULL,
            'SecondaryEmail' => $fields['SecondaryEmail'] ?? NULL,
            'SecondaryName' => $fields['SecondaryName'] ?? NULL,
            'SecondaryPhone' => $fields['SecondaryPhone'] ?? NULL,
        ]);
        $response = [
            'Communication' => $Communication,
        ];
        return response($response, 201);
    }
}
