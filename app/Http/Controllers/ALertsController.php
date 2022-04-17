<?php

namespace App\Http\Controllers;

use App\Models\ALerts;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ALertsController extends Controller
{
    public function index()
    {
        return ALerts::orderBy('id', 'ASC')->get();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'number' => 'required|string',
                'name' => 'required|string',
                'StartTime' => 'required|string',
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
        $ALerts = ALerts::create([
            'number' => $fields['number'],
            'name' => $fields['name'],
            'StartTime' => $fields['StartTime'],
            'description' => $fields['description'],
            'ActionTaken' => $fields['ActionTaken'],
            'NextAction' => $fields['NextAction'],
            'who' => $fields['who'],
            'status' => $fields['status'],
            'CloseTime' => $fields['CloseTime'],
        ]);
        $response = [
            'ALerts' => $ALerts,
        ];
        return response($response, 201);
    }

    public function update(Request $request)
    {
        $ALerts = ALerts::find($request->id);
        $ALerts->update($request->all());
        $response = [
            'message' => "Updated Successfully",
        ];
        return response($response, 201);
    }

    public function delete(Request $request)
    {
        $ALerts = ALerts::find($request->id);
        $ALerts->delete();
        $response = [
            'message' => "Deleted Successfully",
        ];
        return response($response, 201);
    }
}
