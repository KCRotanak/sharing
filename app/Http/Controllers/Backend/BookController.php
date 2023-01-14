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
    $books=Book::get();
    $teachers=Teacher::get();
    $departments=Department::get();
   	return view('backend.books.index',compact('books','teachers','departments'));
   }

   public function upload()
   {
      $books=Book::get();
      $teachers=Teacher::get();
      $departments=Department::get();

   	return view('backend.books.upload',compact('teachers','departments'));
   }

   public function store(Request $request)
   {
   		$book=new Book();

			     $file=$request->file;
	           $filename=time().'.'.$file->getClientOriginalExtension();
		        $request->file->move('assets',$filename);
		        $book->file=$filename;
		        $book->title=$request->title;
              $book->author=$request->author;
              $book->departmentID=$request->departmentID;
              $book->teacherID=$request->teacherID;
              $book->company=$request->company;
              $book->year=$request->year;
		        $book->description=$request->description;
		        $book->save();
         //      $request->validate([
         //       'cover' => 'required',
         //     ]);
         //       $input = $request->all();
         //       if ($image = $request->file('cover')) {
         //       $destinationPath = 'cover/';
         //       $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
         //       $image->move($destinationPath, $profileImage);
         //       $input['cover'] = "$profileImage";
         //   }
       
         //       Book::create($input);
              return redirect()->route('backend.books.index') ->with('success','Book created successfully');

   }
   public function download(Request $request,$file)
   {
        $books = Book::where("file", "=", $file)->first();
        $books->count = $books->count + 1;
        $books->save();
    return response()->download(public_path('assets/'.$file));
   }

   public function view($id)
   {
   	$book=Book::find($id);
      
   	return view('backend.books.view',compact('book'));
   } 
   public function destroy($id)
   {
      $book=Book::findOrFail($id);
      $book->delete();
      return redirect()->route('backend.books.index')
                       ->with('success','Books deleted successfully');
   }

}



