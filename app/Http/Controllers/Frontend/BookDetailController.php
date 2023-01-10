<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Http\Request;

class BookDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Book::get();
        $teachers = Teacher::get();
        $departments = Department::get();
        return view('frontend.bookdetail', compact('book', 'teachers', 'departments'));
    }
    public function show($id)
    {
        $book = Book::find($id);
        return view('frontend.bookdetail', compact('book'));
    }
    
    public function download(Request $request,$file)
   {
    return response()->download(public_path('assets/'.$file));
   }

}
