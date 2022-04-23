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
                'file' => 'required|image',
                'background' => 'required|image',
                'phone' => 'required|string',
                'email' => 'required|string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $fileModel = new Home;
//        $api = 'https://beapis.herokuapp.com';
        if ($req->file()) {
            $fileModel->title = $req->title;
            $fileModel->subtitle = $req->subtitle;
            $fileModel->vision = $req->vision;
            $fileModel->mission = $req->mission;
            $fileModel->goal = $req->goal;
            $fileModel->phone = $req->phone;
            $fileModel->email = $req->email;

            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('Home', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->url = config('config.heroku') . $fileModel->file_path;

            $backgroundName = time() . '_' . $req->background->getClientOriginalName();
            $backgroundPath = $req->file('background')->storeAs('Home', $backgroundName, 'public');
            $fileModel->background_name = time() . '_' . $req->background->getClientOriginalName();
            $fileModel->background_path = '/storage/' . $backgroundPath;
            $fileModel->background_url = config('config.heroku') . $fileModel->background_path;

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
                'title' => 'string',
                'subtitle' => 'string',
                'vision' => 'string',
                'mission' => 'string',
                'goal' => 'string',
                'file' => 'image',
                'background' => 'image',
                'phone' => 'string',
                'email' => 'string',
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $fileModel = Home::find($request->id);
//        $api = 'https://beapis.herokuapp.com';

//        $fileModel->title = $request->title;
//        $fileModel->subtitle = $request->subtitle;
//        $fileModel->vision = $request->vision;
//        $fileModel->mission = $request->mission;
//        $fileModel->goal = $request->goal;


        if ($request->hasFile('file')) {
            if (Home::exists(public_path($fileModel->file_path))) {
                File::delete(public_path($fileModel->file_path));
            }
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('Home', $fileName, 'public');
            $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->url = config('config.heroku') . $fileModel->file_path;
        }

        if ($request->hasFile('background')) {
            if (Home::exists(public_path($fileModel->background_path))) {
                File::delete(public_path($fileModel->background_path));
            }
            $backgroundName = time() . '_' . $request->background->getClientOriginalName();
            $backgroundPath = $request->file('background')->storeAs('Home', $backgroundName, 'public');
            $fileModel->background_name = time() . '_' . $request->background->getClientOriginalName();
            $fileModel->background_path = '/storage/' . $backgroundPath;
            $fileModel->background_url = config('config.heroku') . $fileModel->background_path;
        }
        $fileModel->update($request->all());
        $response = [
            'message' => 'Updated Successfully',
        ];
        return response($response, 201);
    }

    public function destroy(Request $request)
    {
        $pdf = Home::find($request->id);
        if ($pdf != NULL) {
            if (Home::exists(public_path($pdf->file_path)) || Home::exists(public_path($pdf->background_path))) {
                File::delete(public_path($pdf->file_path));
                File::delete(public_path($pdf->background_path));
                Home::destroy($request->id);
                $response = [
                    'message' => 'File Has Been Deleted',
                ];
                return response($response, 201);
            } else {
                $response = [
                    'message' => 'File Does Not Exists',
                ];
                return response($response, 201);
            }
        } else {
            $response = [
                'message' => 'There is No Record Found',
            ];
            return response($response, 201);
        }
    }
}
