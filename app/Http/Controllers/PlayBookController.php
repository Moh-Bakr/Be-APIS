<?php

namespace App\Http\Controllers;

use App\Models\PlayBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
                'title' => 'required|string',
                'description' => 'required|string',
                'category' => 'required|string',
                'data' => 'required|string',
                'file' => 'required|image'
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $fileModel = new PlayBook;
        $api = 'https://beapis.herokuapp.com';
        if ($req->file()) {
            $fileModel->title = $req->title;
            $fileModel->category = $req->category;
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

    public function update(Request $request)
    {
        try {
            $request->validate([
                'title' => 'string',
                'description' => 'string',
                'category' => 'string',
                'data' => 'string',
                'file' => 'image'
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $fileModel = PlayBook::find($request->id);
        $api = 'https://beapis.herokuapp.com';

//        $fileModel->title = $request->title;
//        $fileModel->description = $request->description;
//        $fileModel->data = $request->data;
//        $fileModel->category = $request->category;


        if ($request->file()) {
            if (PlayBook::exists(public_path($fileModel->file_path))) {
                File::delete(public_path($fileModel->file_path));
            }
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('PlayBook', $fileName, 'public');
            $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->url = $api . $fileModel->file_path;
        }

        $fileModel->update($request->all());
        $response = [
            'message' => 'Updated Successfully',
        ];
        return response($response, 201);
    }

    public function destroy(Request $request)
    {
        $pdf = PlayBook::find($request->id);
        if ($pdf != NULL) {
            if (PlayBook::exists(public_path($pdf->file_path))) {
                File::delete(public_path($pdf->file_path));
                PlayBook::destroy($request->id);
                return 'File Has Been Deleted';
            } else {
                return 'File Does Not Exists.';
            }
        } else {
            return 'There is No Record Found';
        }
    }
}
