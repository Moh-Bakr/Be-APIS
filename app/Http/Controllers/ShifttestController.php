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
        //        return ShiftsResource::collection($users);

        $products = shifttest::orderBy('month', 'ASC')->get();;
        return $products->groupBy('month');
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

    public function update(Request $request)
    {
        $shiftsname = shifttest::where('name', $request->name)->first();
        if ($shiftsname == NULL) {
            return "THere is no user with this name " . $request->id;
        } else {
            $shifts = shifttest::where('month', $request->month)->first();
            $shifts->update(['shifts' => $request->shifts]);
        }
        return $shifts;
    }

    public function delete(Request $request)
    {
        $shiftsname = shifttest::where('name', $request->name)->first();
        if ($shiftsname == NULL) {
            return "THere is no user with this name " . $request->id;
        } else {
            $shifts = shifttest::where('month', $request->month)->first();
            $shifts->delete(['shifts' => $request->shifts]);
        }
        $response = [
            'message' => "Deleted Successfully",
        ];
        return response($response, 201);
    }
}
