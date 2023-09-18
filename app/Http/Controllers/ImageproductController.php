<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Imageproduct;
class ImageproductController extends Controller
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
        $imageproducts = Imageproduct::all();
        return view('pages.imageproduct.list', compact('imageproducts'));
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
        $products = Product::all();
        return view('pages.imageproduct.create', compact('products'));
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
            'product_id'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=370,height=370',
         ]);
         $imageproduct = new Imageproduct;
         $imageproduct->product_id = $request->product_id;
         //image
         if($request->file('image')){

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/product",$filename); //move to file
            $imageproduct->image = 'product'.'/'.$filename;
         }

          $imageproduct->save();
         return redirect()->route('dashboard.imageproduct.list')->with('status', "add Image Product created successfully");
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
        $products = Product::all();
        $imageproduct = Imageproduct::find($id);

        return view('pages.imageproduct.edit', compact('imageproduct','products'));
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
            'product_id'=>'required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=370,height=370',
         ]);

         $imageproduct = Imageproduct::find($id);

         $imageproduct->product_id = $request->product_id;
         if($request->file('image')){
            $destination = 'images/'. $imageproduct->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/product",$filename); //move to file
            $imageproduct->image = 'product'.'/'.$filename;
         }

         $imageproduct->update();
         return redirect()->route('dashboard.imageproduct.list')->with('status', "image product updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imageproduct = Imageproduct::find($id);

        $destination = 'images/'. $imageproduct->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $imageproduct->delete();
        return redirect()->route('dashboard.imageproduct.list')->with('status','image product Deleted Successfully');
    }
}
