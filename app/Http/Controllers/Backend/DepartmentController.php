<?php

namespace App\Http\Controllers\Backend;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('backend.departments.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.departments.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $departments = Department::all();
        $request->validate([
            'name' => 'required|unique:departments,name',
        ]);

        Department::create([
            'name'=> $request['name'],

        ]);
        if ($request->has('add-btn')) {
            return view('backend.departments.index', compact('departments'))
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
        return view('backend.departments.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {    
        $departments = Department::all();
        $request->validate([
            'name' => 'required',
            // 'email' => 'required',
        ]);
    
        $department->update($request->all());

        if ($request->has('edit-btn')) {
            return view('backend.departments.index', compact('departments'))
                        ->with('success','User updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
    
        return redirect()->route('departments.index')
                        ->with('success','User deleted successfully');
    }
}
