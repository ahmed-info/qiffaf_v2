<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class CustomerController extends Controller
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
        $customers = Customer::all();
        return view('pages.customer.list', compact('customers'));
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
        return view('pages.customer.create');
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
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=370,height=370',
         ]);
         $customer = new Customer;
         $customer->title = $request->title;
         //image
         if($request->file('image')){

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/customer",$filename); //move to file
            $customer->image = 'customer'.'/'.$filename;
         }

          $customer->save();
         return redirect()->route('dashboard.customer.list')->with('status', "add customer created successfully");
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
        $customer = Customer::find($id);

        return view('pages.customer.edit', compact('customer'));
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
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=370,height=370',
         ]);

         $customer = Customer::find($id);
         $customer->title = $request->title;

         if($request->file('image')){
            $destination = 'images/'. $customer->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/customer",$filename); //move to file
            $customer->image = 'customer'.'/'.$filename;
         }

         $customer->update();
         return redirect()->route('dashboard.customer.list')->with('status', "customer updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);

        $destination = 'images/'. $customer->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $customer->delete();
        return redirect()->route('dashboard.customer.list')->with('status','customer Deleted Successfully');
    }
}
