<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Department;
use App\Models\Socialmedia;
use App\Models\Event;

class EventController extends Controller
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

        $events = Event::all();
        return view('pages.event.list', compact('events'));
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
        return view('pages.event.create');
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
            'address'=>'string|nullable',
            'eventDate'=> 'required|after_or_equal:' . date(DATE_ATOM),
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=770,height=450',
         ]);
         $event = new Event;
         $event->title = $request->title;
         $event->description = $request->description;
         $event->address = $request->address;
         $event->eventDate = $request->eventDate;
          //image
          if($request->file('image')){

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/event",$filename); //move to file
            $event->image = 'event'.'/'.$filename;
         }

          $event->save();
         return redirect()->route('dashboard.event.list')->with('status', "add event created successfully");
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        return view('pages.event.edit', compact('event'));
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
            'address'=>'string|nullable',
            'eventDate'=> 'required|after_or_equal:' . date(DATE_ATOM),
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=770,height=450',

        ]);

         $event = Event::find($id);
         $event->title = $request->title;
         $event->description = $request->description;
         $event->address = $request->address;
         $event->eventDate = $request->eventDate;
         //image
         if($request->file('image')){
            $destination = 'images/'. $event->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/event",$filename); //move to file
            $event->image = 'event'.'/'.$filename;
         }

         $event->update();
         return redirect()->route('dashboard.event.list')->with('status', "Event updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $destination = 'images/'. $event->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $event->delete();
        return redirect()->route('dashboard.event.list')->with('status','Event Deleted Successfully');
    }
}
