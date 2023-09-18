<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Company;
use App\Models\Department;

class CompanyController extends Controller
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
    public function list() {
        $companies = Company::all();
        return view('pages.company.list', compact('companies'));
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
        $departments = Department::all();
        return view('pages.company.create', compact('departments'));
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
            'department_id'=>'required',
            'title'=>'string|nullable',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=370,height=370',
            'image_cover'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096',
         ]);
         $company = new Company;
         $company->department_id = $request->department_id;
         $company->title = $request->title;
         //image
         if($request->file('image')){

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/company",$filename); //move to file
            $company->image = 'company'.'/'.$filename;
         }

          //image Cover
          if($request->file('image_cover')){

            $image = $request->file('image_cover');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/company",$filename); //move to file
            $company->image_cover = 'company'.'/'.$filename;
         }

          $company->save();
         return redirect()->route('dashboard.company.list')->with('status', "add company created successfully");
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
        $departments = Department::all();
        $company = Company::find($id);

        return view('pages.company.edit', compact('company','departments'));
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
            'department_id'=>'required',
            'title'=>'string|nullable',
            'description'=>'string|nullable',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=370,height=370',
         ]);

         $company = Company::find($id);
         $company->department_id = $request->department_id;
         $company->title = $request->title;

         if($request->file('image')){
            $destination = 'images/'. $company->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/company",$filename); //move to file
            $company->image = 'company'.'/'.$filename;
         }

         $company->update();
         return redirect()->route('dashboard.company.list')->with('status', "company updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);

        $destination = 'images/'. $company->image;
        if(File::exists($destination)){
            File::delete($destination);
        }



        $company->delete();
        return redirect()->route('dashboard.company.list')->with('status','company Deleted Successfully');
    }
}
