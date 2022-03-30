<?php

namespace App\Http\Controllers;

use App\Models\ProceduresPDF;
use Illuminate\Http\Request;

class ProceduresPDFController extends Controller
{
    public function index()
    {
        return ProceduresPDF::get()->all();
    }

    public function store(Request $req)
    {
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,png,jpg,jpeg'
        ]);
        $fileModel = new ProceduresPDF;
        if ($req->file()) {
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('ProceduresPDF', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return ('File has been uploaded.');
        }
    }
}
