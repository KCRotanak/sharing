<?php

namespace App\Http\Controllers\Backend;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::all();
        return view('backend.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.teachers.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $teachers = Teacher::all();
        $request->validate([
            'name' => 'required|unique:teachers,name',
            'name' => 'required|unique:teachers,email',
        ]);

        Teacher::create([
            'name'=> $request['name'],
            'email'=> $request['email'],

        ]);
        if ($request->has('add-btn')) {
            return view('backend.teachers.index', compact('teachers'))
            ->with('success', 'department is created successfully.');
        }

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
        return view('backend.teachers.index');
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
        
            $subjects = Teacher::all();

            $request->validate([
                'name' => 'required|unique:teachers,name',
                'email' => 'required|unique:teachers,email',
            ]);
            $subjects->update($request->all());
            
        if ($request->has('edit-btn')) {
            return view('backend.teachers.index', compact('teachers'))
                            ->with('success','User updated successfully');
        }
        
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
}
