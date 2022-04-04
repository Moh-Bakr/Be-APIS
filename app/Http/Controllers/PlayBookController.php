<?php

namespace App\Http\Controllers;

use App\Models\PlayBook;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PlayBookController extends Controller
{
    public function index()
    {
        return PlayBook::get()->all();
    }

    public function store(Request $req)
    {
        try {
            $req->validate([
                'description' => 'required|string',
                'data' => 'required|string',
                'file' => 'required|image'
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $fileModel = new PlayBook;
        $api = 'https://beapis.herokuapp.com';
        if ($req->file()) {
            $fileModel->title = $req->file->getClientOriginalName();
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('PlayBook', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->description = $req->description;
            $fileModel->data = $req->data;
            $fileModel->url = $api . $fileModel->file_path;
            $fileModel->save();
            $response = [
                'message' => 'Created Successfully',
            ];
            return response($response, 201);

//            return [
//                'id' => $fileModel->id,
//                'title' => $fileModel->title,
//                'name' => $fileModel->name,
//                'file_path' => $fileModel->file_path,
//                'url' => $fileModel->url,
//            ];
        }
    }
}
