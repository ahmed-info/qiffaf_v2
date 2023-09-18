<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Socialmedia;

class SocialmediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list()  {
        $socialmedias = Socialmedia::all();
        //return $categories;
        return view('pages.socialmedia.list', compact('socialmedias'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
                //$categories = Category::all();
        return view('pages.socialmedia.create');
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
            'facebook'=>'required|string',
            'instagram' =>'string|nullable',
            'youtube' =>'string|nullable',
            'linkedin' =>'string|nullable',
            'email' =>'string|nullable',
         ]);
         $socialmedia = new Socialmedia;
         $socialmedia->facebook = $request->facebook;
         $socialmedia->instagram = $request->instagram;
         $socialmedia->youtube = $request->youtube;
         $socialmedia->linkedin = $request->linkedin;
         $socialmedia->email = $request->email;

          $socialmedia->save();
         return redirect()->route('dashboard.socialmedia.create')->with('status', "social media updated successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $socialmedia = Socialmedia::first();

        return view('pages.socialmedia.edit', compact('socialmedia'));
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
            'facebook'=>'required|string',
            'instagram' =>'required|string',
            'youtube' =>'string|nullable',
            'email' =>'string|nullable',
         ]);
         $socialmedia = Socialmedia::first();
         $socialmedia->facebook = $request->facebook;
         $socialmedia->instagram = $request->instagram;
         $socialmedia->youtube = $request->youtube;
         $socialmedia->email = $request->email;

         $socialmedia->update();
         return redirect()->route('dashboard.socialmedia.edit')->with('status', "social media updated successfully");
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
