<?php

namespace App\Http\Controllers;

use App\Models\ServiceCateloge;
use Illuminate\Http\Request;

class ServiceCatelogeController extends Controller
{
    public function index()
    {
        return ServiceCateloge::get()->all();
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
        } catch (\Illuminate\Validation\ValidationException $th) {
            return $th->validator->errors();
        }
        $AdvisorySource = ServiceCateloge::create([
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
            'AdvisorySource' => $AdvisorySource,
        ];
        return response($response, 201);
    }
}
