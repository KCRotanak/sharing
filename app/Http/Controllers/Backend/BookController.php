<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use App\Models\Book;
use App\Models\Teacher;
use App\Models\Department;
class BookController extends Controller
{
   public function index()
   {
    $thesis=Book::get();
    $teachers=Teacher::get();
    $departments=Department::get();
   	return view('backend.thesis.index',compact('thesis','teachers','departments'));
   }
    public function upload()
   {
      $thesis=Book::get();
      $teachers=Teacher::get();
      $departments=Department::get();
   	return view('backend.thesis.upload',compact('teachers','departments'));
   }

     public function store(Request $request)
   {
   		$thesis=new Book();

			     $file=$request->file;
	           $filename=time().'.'.$file->getClientOriginalExtension();
		        $request->file->move('assets',$filename);
		        $thesis->file=$filename;
		        $thesis->title=$request->title;
              $thesis->author=$request->author;
              $thesis->departmentID=$request->departmentID;
              $thesis->teacherID=$request->teacherID;
              $thesis->company=$request->company;
              $thesis->year=$request->year;
		        $thesis->description=$request->description;
		        $thesis->save();

              return redirect()->route('backend.thesis.index') ->with('success','Thesis deleted successfully');

   }
//    public function show()
//    {
//    	$thesis=Thesis::all();
//    	return view('backend.thesis.show',compact('thesis'));
//    }
      public function download(Request $request,$file)
   {
    return response()->download(public_path('assets/'.$file));
   }
   public function view($id)
   {
   	$thesis=Book::find($id);
   	return view('backend.thesis.view',compact('thesis'));
   } 
   public function destroy(Book $thesis)
   {
       $thesis->delete();
       return redirect()->route('backend.thesis.index')
                       ->with('success','Message deleted successfully');
   }
}



