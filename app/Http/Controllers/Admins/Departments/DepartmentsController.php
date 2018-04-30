<?php

namespace App\Http\Controllers\Admins\Departments;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;

class DepartmentsController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $departments = \App\Department::all();
        return view('admins.departments.view', compact('departments'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255|min:4'
        ]);
        try{
            $department = new Department;
            $department->name = $request->input("name");
            $department->save();
            return redirect("/admin/departments/view");
        }catch(Exception $e){
            return back()->withInput();
        }
    }

    public function edit(Department $department)
    {
        return view('admins.departments.edit', compact("department"));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $validatedData = $request->validate([
            'name' => "required|max:255|min:4|unique:departments,name,$department->id"
        ]);
        try{
            $department->name = $request->input("name");
            $department->save();
            return redirect("/admin/departments/view");
        }catch(Exception $e){
            return back()->withInput();
        }
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect("/admin/departments/view");
    }

}
