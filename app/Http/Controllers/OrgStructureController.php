<?php

namespace App\Http\Controllers;

use App\Models\OrgStructure;
use Illuminate\Http\Request;

class OrgStructureController extends Controller
{
    public function index()
    {
        return OrgStructure::get()->all();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'org' => 'required|string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {
            return $th->validator->errors();
        }
        $org = OrgStructure::create([
            'org' => $fields['org'],
        ]);
        $response = [
            'org' => $org,
        ];
        return response($response, 201);
    }

    public function update(Request $request)
    {
        try {
            $fields = $request->validate([
                'org' => 'string',
            ]);
        } catch (\Illuminate\Validation\ValidationException $th) {
            return $th->validator->errors();
        }
        $org = OrgStructure::find($request->id);
        $org->update(['org' => $fields['org']]);
        return $org;

    }
}
