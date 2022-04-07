<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShiftsResource;
use App\Models\shifttest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ShifttestController extends Controller
{
    public function index()
    {
//        return shifttest::get()->all();

//        $users = shifttest::query()
//            ->select('month', 'name', 'shifts')
//            ->groupBy('month', 'name')->orderBy('name')
//            ->get()->all();
        $products = shifttest::all();
        return $products->groupBy('month');

//        return ShiftsResource::collection($users);
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
        shifttest::create([
            'month' => $fields['month'],
            'name' => $fields['name'],
            'shifts' => $fields['shifts'],
        ]);
        $response = [
            'message' => "Created Successfully",
        ];
        return response($response, 201);

    }

//    public function update(Request $request)
//    {
//        $id = 1;
//        $shifts = shifttest::find($id);
//        if ($shifts == NULL) {
//            return "THere is no staff with id " . $request->id;
//        }
//        $shifts->update($request->all());
//        return $shifts;
//    }
}
