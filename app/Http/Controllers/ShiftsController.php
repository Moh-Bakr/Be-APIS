<?php

namespace App\Http\Controllers;

use App\Models\Shifts;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ShiftsController extends Controller
{
    public function index()
    {
        return Shifts::get()->all();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'shifts' => 'required|string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        Shifts::create([
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
        $shifts = Shifts::find($id);
        if ($shifts == NULL) {
            return "THere is no staff with id " . $request->id;
        }
        $shifts->update($request->all());
        return $shifts;
    }
}
