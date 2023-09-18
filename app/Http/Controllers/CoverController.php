<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Cover;
class CoverController extends Controller
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
        $covers = Cover::all();
        return view('pages.cover.list', compact('covers'));
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
        return view('pages.cover.create');
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
            'cover_about'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=1920,height=650',
            'cover_department'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=1920,height=650',
            'cover_company'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=1920,height=650',
            'cover_event'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=1920,height=300',
            'cover_contact'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=1920,height=650',
         ]);
         $cover = new Cover;

         //image about
         if($request->file('cover_about')){

            $image = $request->file('cover_about');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/cover",$filename); //move to file
            $cover->cover_about = 'cover'.'/'.$filename;
         }

          //image department
          if($request->file('cover_department')){

            $image = $request->file('cover_department');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/cover",$filename); //move to file
            $cover->cover_department = 'cover'.'/'.$filename;
         }

          //image company
          if($request->file('cover_company')){

            $image = $request->file('cover_company');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/cover",$filename); //move to file
            $cover->cover_company = 'cover'.'/'.$filename;
         }

         //image event
         if($request->file('cover_event')){

            $image = $request->file('cover_event');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/cover",$filename); //move to file
            $cover->cover_event = 'cover'.'/'.$filename;
         }

          //image contact
          if($request->file('cover_contact')){

            $image = $request->file('cover_contact');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/cover",$filename); //move to file
            $cover->cover_contact = 'cover'.'/'.$filename;
         }

          $cover->save();
         return redirect()->route('dashboard.cover.list')->with('status', "add Cover created successfully");
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
    public function edit()
    {
        $cover = Cover::first();

        return view('pages.cover.edit', compact('cover'));
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
            'cover_about'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=1920,height=650',
            'cover_department'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=1920,height=650',
            'cover_company'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=1920,height=650',
            'cover_event'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=1920,height=300',
            'cover_contact'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=1920,height=650',
         ]);

         $cover = Cover::find($id);


         if($request->file('cover_about')){
            $destination = 'images/'. $cover->cover_about;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('cover_about');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/cover",$filename); //move to file
            $cover->cover_about = 'cover'.'/'.$filename;
         }

         if($request->file('cover_department')){
            $destination2 = 'images/'. $cover->cover_department;
            if(File::exists($destination2)){
                File::delete($destination2);
            }
            $image = $request->file('cover_department');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/cover",$filename); //move to file
            $cover->cover_department = 'cover'.'/'.$filename;
         }

         if($request->file('cover_company')){
            $destination3 = 'images/'. $cover->cover_company;
            if(File::exists($destination3)){
                File::delete($destination3);
            }
            $image = $request->file('cover_company');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/cover",$filename); //move to file
            $cover->cover_company = 'cover'.'/'.$filename;
         }

         if($request->file('cover_event')){
            $destination4 = 'images/'. $cover->cover_event;
            if(File::exists($destination4)){
                File::delete($destination4);
            }
            $image = $request->file('cover_event');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/cover",$filename); //move to file
            $cover->cover_event = 'cover'.'/'.$filename;
         }

         if($request->file('cover_contact')){
            $destination5 = 'images/'. $cover->cover_contact;
            if(File::exists($destination5)){
                File::delete($destination5);
            }
            $image = $request->file('cover_contact');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/cover",$filename); //move to file
            $cover->cover_contact = 'cover'.'/'.$filename;
         }

         $cover->update();
         return redirect()->route('dashboard.cover.edit')->with('status', "Cover updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cover = Cover::find($id);

        $destination = 'images/'. $cover->cover_aboute;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $cover->delete();
        return redirect()->route('dashboard.cover.edit')->with('status','Cover Deleted Successfully');
    }
}
