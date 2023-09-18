<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modeeldetail;
use App\Models\Modeel;

class ModeeldetailController extends Controller
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
        $modeeldetails = Modeeldetail::all();
        return view('pages.modeeldetail.list', compact('modeeldetails'));
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
        $modeels = Modeel::all();
        return view('pages.modeeldetail.create', compact('modeels'));
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
            'modeel_id'=>'required',
            'title'=>'string|nullable',
            'description'=>'string|nullable',
         ]);
         $modeeldetail = new Modeeldetail;
         $modeeldetail->modeel_id = $request->modeel_id;
         $modeeldetail->title = $request->title;
         $modeeldetail->description = $request->description;
         $modeeldetail->save();
         return redirect()->route('dashboard.modeeldetail.list')->with('status', "add model detail created successfully");
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
        $modeels = Modeel::all();
        $modeeldetail = Modeeldetail::find($id);

        return view('pages.modeeldetail.edit', compact('modeeldetail','modeels'));
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
            'modeel_id'=>'required',
            'title'=>'string|nullable',
            'description'=>'string|nullable',
         ]);

         $modeeldetail = Modeeldetail::find($id);
         $modeeldetail->modeel_id = $request->modeel_id;
         $modeeldetail->title = $request->title;
         $modeeldetail->description = $request->description;



         $modeeldetail->update();
         return redirect()->route('dashboard.modeeldetail.list')->with('status', "model detail updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modeeldetail = Modeeldetail::find($id);

        $modeeldetail->delete();
        return redirect()->route('dashboard.modeeldetail.list')->with('status','modeel detail Deleted Successfully');
    }
}
