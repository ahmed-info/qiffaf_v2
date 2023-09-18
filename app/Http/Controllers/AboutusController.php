<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aboutus;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class AboutusController extends Controller
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
        $aboutuses = Aboutus::all();
        return view('pages.aboutus.list', compact('aboutuses'));
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
        return view('pages.aboutus.create');
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
            'title'=>'string|required',
            'ourMission'=>'string|nullable',
            'ourVision'=>'string|nullable',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=542,height=446',
         ]);
         $aboutus = new Aboutus;
         $aboutus->title = $request->title;
         $aboutus->ourMission = $request->ourMission;
         $aboutus->ourVision = $request->ourVision;
         //image
         if($request->file('image')){

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/aboutus",$filename); //move to file
            $aboutus->image = 'aboutus'.'/'.$filename;
         }
          $aboutus->save();
         return redirect()->route('dashboard.aboutus.list')->with('status', "add About us created successfully");
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
        $aboutus = Aboutus::first();

        return view('pages.aboutus.edit', compact('aboutus'));
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
            'title'=>'string|required',
            'ourMission'=>'string|nullable',
            'ourVision'=>'string|nullable',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=542,height=466',
         ]);

         $aboutus = Aboutus::find($id);
         $aboutus->title = $request->title;
         $aboutus->ourMission = $request->ourMission;
         $aboutus->ourVision = $request->ourVision;

         $aboutus->update();
         return redirect()->route('dashboard.aboutus.list')->with('status', "About us updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aboutus = Aboutus::find($id);

        $destination = 'images/'. $aboutus->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $destination2 = 'images/'. $aboutus->image_cover;
        if(File::exists($destination2)){
            File::delete($destination2);
        }
        $aboutus->delete();
        return redirect()->route('dashboard.aboutus.list')->with('status','About Us Deleted Successfully');
    }
}
