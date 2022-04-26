<?php

namespace App\Http\Controllers;

use App\Models\AllShifts;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AllShiftsController extends Controller
{
    public function index()
    {
        return AllShifts::orderBy('id', 'ASC')->get();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'name' => 'required|string',
                'mode' => 'required|string',
                'color' => 'required|string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        AllShifts::create([
            'name' => $fields['name'],
            'mode' => $fields['mode'],
            'color' => $fields['color'],
        ]);
        $response = [
            'message' => "Created Successfully",
        ];
        return response($response, 201);
    }

    public function update(Request $request)
    {
        $Incidents = AllShifts::find($request->id);
        $Incidents->update($request->all());
        $response = [
            'message' => "Updated Successfully",
        ];
        return response($response, 201);
    }

    public function delete(Request $request)
    {
        $Incidents = AllShifts::find($request->id);
        $Incidents->delete();
        $response = [
            'message' => "Deleted Successfully",
        ];
        return response($response, 201);
    }
}
