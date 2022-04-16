<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class HomeController extends Controller
{
    public function index()
    {
        return Home::get()->all();
    }

    public function store(Request $req)
    {
        try {
            $req->validate([
                'title' => 'required|string',
                'subtitle' => 'required|string',
                'vision' => 'required|string',
                'mission' => 'required|string',
                'goal' => 'required|string',
                'file' => 'required|image'
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $fileModel = new Home;
        $api = 'https://beapis.herokuapp.com';
        if ($req->file()) {
            $fileModel->title = $req->title;
            $fileModel->subtitle = $req->subtitle;
            $fileModel->vision = $req->vision;
            $fileModel->mission = $req->mission;
            $fileModel->goal = $req->goal;
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('Home', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->url = $api . $fileModel->file_path;
            $fileModel->save();
            $response = [
                'message' => 'Created Successfully',
            ];
            return response($response, 201);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'subtitle' => 'required|string',
                'vision' => 'required|string',
                'mission' => 'required|string',
                'goal' => 'required|string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $fileModel = Home::find($request->id);
        $api = 'https://beapis.herokuapp.com';

        $fileModel->title = $request->title;
        $fileModel->subtitle = $request->subtitle;
        $fileModel->vision = $request->vision;
        $fileModel->mission = $request->mission;
        $fileModel->goal = $request->goal;


        if ($request->file()) {
            if (Home::exists(public_path($fileModel->file_path))) {
                File::delete(public_path($fileModel->file_path));
            }
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('Home', $fileName, 'public');
            $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->url = $api . $fileModel->file_path;
            $fileModel->update();
            $response = [
                'message' => 'Updated Successfully',
            ];
            return response($response, 201);
        }
    }

    public function destroy(Request $request)
    {
        $pdf = Home::find($request->id);
        if ($pdf != NULL) {
            if (Home::exists(public_path($pdf->file_path))) {
                File::delete(public_path($pdf->file_path));
                Home::destroy($request->id);
                return 'File Has Been Deleted';
            } else {
                return 'File Does Not Exists.';
            }
        } else {
            return 'There is No Record Found';
        }
    }
}
