<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PDF;
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
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,png|max:2048'
        ]);
        $fileModel = new PDF;
        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return ( 'File has been uploaded.');
        }
    }
}

