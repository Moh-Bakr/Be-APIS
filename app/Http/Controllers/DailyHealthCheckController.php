<?php

namespace App\Http\Controllers;

use App\Models\DailyHealthCheck;
use Illuminate\Http\Request;

class DailyHealthCheckController extends Controller
{
    public function index()
    {
        return DailyHealthCheck::get()->all();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'description' => 'required|string',
                'status' => 'required|boolean',
                'issuesfound' => 'required|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {
            return $th->validator->errors();
        }
        $HealthCheck = DailyHealthCheck::create([
            'description' => $fields['description'],
            'status' => $fields['status'],
            'issuesfound' => $fields['issuesfound'],
        ]);
        $response = [
            'HealthCheck' => $HealthCheck,
        ];
        return response($response, 201);
    }
}
