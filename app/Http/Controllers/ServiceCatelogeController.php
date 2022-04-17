<?php

namespace App\Http\Controllers;

use App\Models\ServiceCateloge;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ServiceCatelogeController extends Controller
{
    public function index()
    {
        return ServiceCateloge::orderBy('id', 'ASC')->get();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'name' => 'required|string',
                'owner' => 'required|string',
                'description' => 'required|string',
                'status' => 'required|string',
                'hours' => 'required|string',
                'inputs' => 'required|string',
                'outputs' => 'required|string',
                'consumers' => 'required|string',
                'processes' => 'required|string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $ServiceCateloge = ServiceCateloge::create([
            'name' => $fields['name'],
            'owner' => $fields['owner'],
            'description' => $fields['description'],
            'status' => $fields['status'],
            'hours' => $fields['hours'],
            'inputs' => $fields['inputs'],
            'outputs' => $fields['outputs'],
            'consumers' => $fields['consumers'],
            'processes' => $fields['processes'],
        ]);
        $response = [
            'ServiceCateloge' => $ServiceCateloge,
        ];
        return response($response, 201);
    }

    public function update(Request $request)
    {
        $ServiceCateloge = ServiceCateloge::find($request->id);
        $ServiceCateloge->update($request->all());
        $response = [
            'message' => "Updated Successfully",
        ];
        return response($response, 201);
    }

    public function delete(Request $request)
    {
        $ServiceCateloge = ServiceCateloge::find($request->id);
        $ServiceCateloge->delete();
        $response = [
            'message' => "Deleted Successfully",
        ];
        return response($response, 201);
    }
}
