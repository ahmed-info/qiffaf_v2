<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
class AddressController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function list(){
        $addresses = Address::all();
        return view('pages.address.list', compact('addresses'));
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
        return view('pages.address.create');

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
            'mobile'=>'required|string',
            'address' =>'required|string',
            'location' =>'nullable|string',
         ]);
         $address = new Address;
         $address->mobile = $request->mobile;
         $address->address = $request->address;
         $address->location = $request->location;

          $address->save();
         return redirect()->route('dashboard.address.list')->with('status', "address created successfully");
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

        $address =Address::find($id);
        return view('pages.address.edit', compact('address'));
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
            'mobile'=>'required|string',
            'address' =>'required|string',
            'location' =>'nullable|string',
         ]);
         $address = Address::find($id);
         $address->mobile = $request->mobile;
         $address->address = $request->address;
         $address->location = $request->location;

          $address->update();
         return redirect()->route('dashboard.address.list')->with('status', "address updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);

        $address->delete();

        return redirect()->route('dashboard.address.list')->with('status','Address Deleted Successfully');
    }
}
