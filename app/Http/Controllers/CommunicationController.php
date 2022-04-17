<?php

namespace App\Http\Controllers;

use App\Models\Communication;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CommunicationController extends Controller
{
    public function index()
    {
        return Communication::orderBy('id', 'ASC')->get();
    }

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

    public function update(Request $request)
    {
        $Communication = Communication::find($request->id);
        $Communication->update($request->all());
        $response = [
            'message' => "Updated Successfully",
        ];
        return response($response, 201);
    }

    public function delete(Request $request)
    {
        $Communication = Communication::find($request->id);
        $Communication->delete();
        $response = [
            'message' => "Deleted Successfully",
        ];
        return response($response, 201);
    }
}
