<?php


namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use App\Models\Book;
class BookController extends Controller
{
   public function index()
   {
    $thesis=Book::get();
   	return view('backend.thesis.index',compact('thesis'));
   }
    public function upload()
   {
   	return view('backend.thesis.upload');
   }

     public function store(Request $request)
   {
   		$thesis=new Book();
			     $file=$request->file;
	           $filename=time().'.'.$file->getClientOriginalExtension();
		        $request->file->move('assets',$filename);
		        $thesis->file=$filename;
		        $thesis->name=$request->name;
                // $thesis->name=$request->name;
		        // $thesis->description=$request->description;
		        $thesis->save();
		        return redirect()->back();

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
}



