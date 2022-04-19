<?php

namespace App\Http\Controllers;

use App\Models\SkillMatrix;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SkillMatrixController extends Controller
{
    public function index()
    {
        $SkillMatrix = SkillMatrix::orderBy('Level')->get();;
        return $SkillMatrix->groupBy('Category');
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'Category' => 'required|string',
                'Skill' => 'required|string',
                'Level' => 'required|string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        SkillMatrix::create([
            'Category' => $fields['Category'],
            'Skill' => $fields['Skill'],
            'Level' => $fields['Level'],
        ]);
        $response = [
            'message' => "Created Successfully",
        ];
        return response($response, 201);
    }

    public function update(Request $request)
    {
        $SkillMatrix = SkillMatrix::find($request->id);
        $SkillMatrix->update($request->all());
        $response = [
            'message' => "Updated Successfully",
        ];
        return response($response, 201);
    }

    public function delete(Request $request)
    {
        $SkillMatrix = SkillMatrix::find($request->id);
        $SkillMatrix->delete();
        $response = [
            'message' => "Deleted Successfully",
        ];
        return response($response, 201);
    }
}
