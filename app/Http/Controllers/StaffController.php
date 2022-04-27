<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StaffController extends Controller
{
    public function index()
    {
        $products = Staff::orderBy('id', 'ASC')->get();;
        return $products->groupBy('Title');
//        return Staff::get()->all();
    }

    public function store(Request $request)
    {
        try {
            $fields = $request->validate([
                'Name' => 'required|string',
                'Title' => 'required|string',
                'Email' => 'required|string',
                'Mobile' => 'required|string',
                'Phone' => 'required|string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $Staff = Staff::create([
            'Name' => $fields['Name'],
            'Title' => $fields['Title'],
            'Email' => $fields['Email'],
            'Mobile' => $fields['Mobile'],
            'Phone' => $fields['Phone'],
        ]);
        $response = [
            'Staff' => $Staff,
        ];
        return response($response, 201);
    }

    public function update(Request $request)
    {

        $Staff = Staff::find($request->id);
        if ($Staff == NULL) {
            return "THere is no staff with id " . $request->id;
        }
        $Staff->update($request->all());
        return $Staff;
    }

    public function destroy(Request $request)
    {
        $Staff = Staff::find($request->id);
        if ($Staff == NULL) {
            return "THere is no staff with id " . $request->id;
        }
        Staff::destroy($request->id);
        return "Deleted Successfully " . $request->id;
    }
}
