<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PDF;
use File;
use Illuminate\Validation\ValidationException;
use Storage;
use Validator;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function index()
    {
        return PDF::get()->all();
    }

    public function store(Request $req)
    {
        try {
            $req->validate([
                'title' => 'required|string',
                'file' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpg,jpeg'
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }

        $fileModel = new PDF;
        if ($req->file()) {
            $fileModel->title = $req->title;
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return [
                'title' => $fileModel->title,
                'name' => $fileModel->name,
                'file_path' => $fileModel->file_path,
            ];
        }
    }

    public function destroy(Request $request)
    {
        $pdf = PDF::find($request->id);
        if ($pdf != NULL) {
            if (File::exists(public_path($pdf->file_path))) {
                File::delete(public_path($pdf->file_path));
                PDF::destroy($request->id);
                return 'File Has Been Deleted';
            } else {
                return 'File Does Not Exists.';
            }
        } else {
            return 'There is No Record Found';
        }

    }
}

