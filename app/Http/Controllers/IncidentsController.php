<?php

namespace App\Http\Controllers;

use App\Models\Incidents;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class IncidentsController extends Controller
{
    public function index()
    {
        return Incidents::orderBy('id', 'ASC')->get();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'date' => 'required|string',
                'name' => 'required|string',
                'number' => 'required|string',
                'description' => 'required|string',
                'ActionTaken' => 'required|string',
                'NextAction' => 'required|string',
                'who' => 'required|string',
                'status' => 'required|string',
                'CloseTime' => 'required|string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $Incidents = Incidents::create([
            'date' => $fields['date'],
            'name' => $fields['name'],
            'number' => $fields['number'],
            'description' => $fields['description'],
            'ActionTaken' => $fields['ActionTaken'],
            'NextAction' => $fields['NextAction'],
            'who' => $fields['who'],
            'status' => $fields['status'],
            'CloseTime' => $fields['CloseTime'],
        ]);
        $response = [
            'Incidents' => $Incidents,
        ];
        return response($response, 201);
    }

    public function update(Request $request)
    {
        $Incidents = Incidents::find($request->id);
        $Incidents->update($request->all());
        $response = [
            'message' => "Updated Successfully",
        ];
        return response($response, 201);
    }

    public function delete(Request $request)
    {
        $Incidents = Incidents::find($request->id);
        $Incidents->delete();
        $response = [
            'message' => "Deleted Successfully",
        ];
        return response($response, 201);
    }
}
