<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Teacher;
use App\Models\Department;
use Illuminate\Http\Request;


class BrowseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::orderByDesc('id')->orderBy('id')->paginate(10);
        $teachers=Teacher::get();
        $departments=Department::get();
        return view('frontend.browse',compact('books','teachers','departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter(Request $request)
    {

        // dd($request->all());

        $inputDep = $request->input('inputDep');
        $inputTec = $request->input('inputTec');
        $inputYear = $request->input('inputYear');

        $books = Book::select()
        
        ->where(function($query) use ($inputDep){
           if ($inputDep){
            $query->where('departmentID', $inputDep);
           }
        }) 

        ->where(function($query) use ($inputTec){
            if ($inputTec){
                $query->where('teacherID', $inputTec);
            }
        })

        ->where(function($query) use ($inputYear){
            if ($inputYear){
                $query->where('year','=', $inputYear);
            }
        })

        ->get();

        $teachers = Teacher::get();
        $departments = Department::get();
    
        return view('frontend.browse', compact('books','teachers', 'departments'));
        
    }

    public function search(Request $request)
    {

        // dd($request->all());

        $inputSearch = $request->input('inputSearch');

        $books = Book::select()
        
        ->where(function($query) use ($inputSearch){
           if ($inputSearch){
            $query->where('title', 'like', $inputSearch);
           }
        }) 
        ->orWhere(function($query) use ($inputSearch){
           if ($inputSearch){
            $query->where('author', 'like', $inputSearch);
           }
        }) 
        ->orWhere(function($query) use ($inputSearch){
           if ($inputSearch){
            $query->where('year', 'like', $inputSearch);
           }
        }) 

        ->get();
    
        $teachers = Teacher::get();
        $departments = Department::get();
    
        return view('frontend.browse', compact('books','teachers', 'departments'));
        
    }
}
