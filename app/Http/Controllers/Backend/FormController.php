<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

use App\Models\Department;
use App\Models\Subject;
use App\Models\test_table;

class FormController extends Controller
{
    //view page
    public function index()
    {
        $departments = Department::get();
        $subjects = Subject::get();

        $data = test_table::get();
        return view('form', compact('data', 'subjects', 'departments'));
    }


    // save record
    public function saveRecord(Request $request)
    {

        // upload file
        $folder_name = 'upload';
        $subjectID = $request->subjectID;
        $departmentID = $request->departmentID;

        Storage::disk('local')->makeDirectory($folder_name, 0775, true); //creates directory
        if ($request->hasFile('fileupload')) {
            foreach ($request->fileupload as $pdf) {
                $destinationPath = $folder_name . '/';
                $file_name = $pdf->getClientOriginalName(); //Get file original name             
                $upload_tbl = [
                    'file_name' => $file_name,
                    'path' => $destinationPath . $file_name,
                    'subjectID' => $subjectID,
                    'departmentID' => $departmentID,
                ];

                Storage::disk('local')->put($folder_name . '/' . $file_name, file_get_contents($pdf->getRealPath()));
                test_table::insert($upload_tbl);
            }
        }
        return redirect()->back();
    }

    //download
    public function download($id)
    {
        $data = DB::table('test_tables')->where('id', $id)->first();
        // return dd($data);
        $filepath = storage_path("app/{$data->path}");
        return Response::download($filepath);
    }
}
