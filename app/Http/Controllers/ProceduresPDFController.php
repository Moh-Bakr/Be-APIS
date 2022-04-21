<?php

namespace App\Http\Controllers;

use App\Models\ProceduresPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class ProceduresPDFController extends Controller
{
    public function index()
    {
        return ProceduresPDF::get()->all();
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
        $fileModel = new ProceduresPDF;
        $api = 'https://beapis.herokuapp.com';
        if ($req->file()) {
            $fileModel->title = $req->title;
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('ProceduresPDF', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->url = $api . $fileModel->file_path;
            $fileModel->save();

            return [
                'id' => $fileModel->id,
                'title' => $fileModel->title,
                'name' => $fileModel->name,
                'file_path' => $fileModel->file_path,
                'url' => $fileModel->url,
            ];
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'title' => 'string',
                'file' => 'mimes:pdf'
            ]);
        } catch (ValidationException $th) {
            return $th->validator->errors();
        }
        $fileModel = ProceduresPDF::find($request->id);
        $api = 'https://beapis.herokuapp.com';

//        $fileModel->title = $request->title;


        if ($request->file()) {
            if (ProceduresPDF::exists(public_path($fileModel->file_path))) {
                File::delete(public_path($fileModel->file_path));
            }
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('ProceduresPDF', $fileName, 'public');
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
        $pdf = ProceduresPDF::find($request->id);
        if ($pdf != NULL) {
            if (ProceduresPDF::exists(public_path($pdf->file_path))) {
                File::delete(public_path($pdf->file_path));
                ProceduresPDF::destroy($request->id);
                return 'File Has Been Deleted';
            } else {
                return 'File Does Not Exists.';
            }
        } else {
            return 'There is No Record Found';
        }

    }
}
