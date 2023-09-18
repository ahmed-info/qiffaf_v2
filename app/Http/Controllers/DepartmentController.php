<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Company;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function list()
    {
        $departments = Department::all();
        //return $categories;
        return view('pages.department.list', compact('departments'));
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.department.create');
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|string',
         ]);

         $department = new Department;
         $department->title = $request->title;
          $department->save();
         return redirect()->route('dashboard.department.list')->with('status', "department created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
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
        $department = Department::find($id);

        return view('pages.department.edit', compact('department'));
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
        $this->validate($request,[
            'title'=>'required|string',
         ]);
         $department = Department::find($id);
         $department->title = $request->title;

          $department->save();
         return redirect()->route('dashboard.department.list')->with('status', "Department updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        //image
        $department->delete();

        return redirect()->route('dashboard.department.list')->with('status','Department Deleted Successfully');
    }
}
