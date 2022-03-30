<?php

namespace App\Http\Controllers;

use App\Models\PoliciesPDF;
use File;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PoliciesPDFController extends Controller
{
    public function index()
    {
        return PoliciesPDF::get()->all();
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
        $fileModel = new PoliciesPDF;
        if ($req->file()) {
            $fileModel->title = $req->title;
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('PoliciesPDF', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return ('File has been uploaded.');
        }
    }

    public function destroy(Request $request)
    {
        $pdf = PoliciesPDF::find($request->id);
        if ($pdf != NULL) {
            if (PoliciesPDF::exists(public_path($pdf->file_path))) {
                File::delete(public_path($pdf->file_path));
                PoliciesPDF::destroy($request->id);
                return 'File Has Been Deleted';
            } else {
                return 'File Does Not Exists.';
            }
        } else {
            return 'There is No Record Found';
        }

    }
}
