<?php

namespace App\Http\Controllers;

use App\Models\OrgStructure;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class OrgStructureController extends Controller
{
    public function index()
    {
        return OrgStructure::orderBy('id', 'ASC')->get();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'org' => 'required|string',
            ]);
        } catch (ValidationException $th) {
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
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $org = OrgStructure::find($request->id);
        $org->update(['org' => $fields['org']]);
        return $org;
    }

    public function delete(Request $request)
    {
        $OrgStructure = OrgStructure::find($request->id);
        $OrgStructure->delete();
        $response = [
            'message' => "Deleted Successfully",
        ];
        return response($response, 201);
    }
}
