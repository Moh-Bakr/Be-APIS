<?php

namespace App\Http\Controllers;

use App\Models\ReportsPDF;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReportsPDFController extends Controller
{
    public function index()
    {
        return ReportsPDF::get()->all();
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
        $fileModel = new ReportsPDF;
        $api = 'https://beapis.herokuapp.com';
        if ($req->file()) {
            $fileModel->title = $req->title;
            $fileName = time() . '_' . $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('ReportsPDF', $fileName, 'public');
            $fileModel->name = time() . '_' . $req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->url = config('config.heroku') . $fileModel->file_path;
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
        $fileModel = ReportsPDF::find($request->id);
        $api = 'https://beapis.herokuapp.com';

//        $fileModel->title = $request->title;

        if ($request->file()) {
            if (ReportsPDF::exists(public_path($fileModel->file_path))) {
                File::delete(public_path($fileModel->file_path));
            }
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('ReportsPDF', $fileName, 'public');
            $fileModel->name = time() . '_' . $request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->url = config('config.heroku') . $fileModel->file_path;
        }
        $fileModel->update($request->all());
        $response = [
            'message' => 'Updated Successfully',
        ];
        return response($response, 201);
    }

    public function destroy(Request $request)
    {
        $pdf = ReportsPDF::find($request->id);
        if ($pdf != NULL) {
            if (ReportsPDF::exists(public_path($pdf->file_path))) {
                File::delete(public_path($pdf->file_path));
                ReportsPDF::destroy($request->id);
                return 'File Has Been Deleted';
            } else {
                return 'File Does Not Exists.';
            }
        } else {
            return 'There is No Record Found';
        }

    }
}
