<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class SlideController extends Controller
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
        $slides = Slide::all();
        return view('pages.slide.list', compact('slides'));
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
        return view('pages.slide.create');
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
            'title'=>'string|nullable',
            'description'=>'string|nullable',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=1920,height=650',
         ]);
         $slide = new Slide;
         $slide->title = $request->title;
         $slide->description = $request->description;
         //image
         if($request->file('image')){

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/slide",$filename); //move to file
            $slide->image = 'slide'.'/'.$filename;
         }

          $slide->save();
         return redirect()->route('dashboard.slide.list')->with('status', "add Slide created successfully");
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
        $slide = Slide::find($id);

        return view('pages.slide.edit', compact('slide'));
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
            'title'=>'string|nullable',
            'description'=>'string|nullable',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=1920,height=650',
         ]);

         $slide = Slide::find($id);
         $slide->title = $request->title;
         $slide->description = $request->description;

         if($request->file('image')){
            $destination = 'images/'. $slide->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/slide",$filename); //move to file
            $slide->image = 'slide'.'/'.$filename;
         }

         $slide->update();
         return redirect()->route('dashboard.slide.list')->with('status', "Slide updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);

        $destination = 'images/'. $slide->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $slide->delete();
        return redirect()->route('dashboard.slide.list')->with('status','Slide Deleted Successfully');
    }
}
