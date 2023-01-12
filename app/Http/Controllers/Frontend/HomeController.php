<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book=Book::orderByDesc('id')->orderBy('id')->paginate(9);
        $teachers=Teacher::get();
        $departments=Department::get();
           return view('frontend.home',compact('book','teachers','departments'));
    }


}
