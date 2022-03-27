<?php

namespace App\Http\Controllers;

use App\Models\ALerts;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ALertsController extends Controller
{
    public function index()
    {
        return ALerts::get()->all();
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
}
