<?php

namespace App\Http\Controllers;

use App\Models\shift;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ShiftController extends Controller
{
    public function index()
    {
        return shift::get()->all();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'shifts' => 'required|string',
                'name' => 'required|string',
                'month' => 'required|string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        shift::create([
            'month' => $fields['month'],
            'name' => $fields['name'],
            'shifts' => $fields['shifts'],
        ]);
        $response = [
            'message' => "Created Successfully",
        ];
        return response($response, 201);

    }

    public function update(Request $request)
    {
        $id = 1;
        $shifts = shift::find($id);
        if ($shifts == NULL) {
            return "THere is no staff with id " . $request->id;
        }
        $shifts->update($request->all());
        return $shifts;
    }
}
