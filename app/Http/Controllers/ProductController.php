<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Company;
use App\Models\Product;
use App\Models\Department;
class ProductController extends Controller
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

        $products = Product::all();
        //$products = Product::first();
        // print_r($products->imageproducts[0]->image);
        // return "";
        return view('pages.product.list', compact('products'));
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
        $companies = Company::all();
        return view('pages.product.create', compact('companies'));
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
            'company_id'=>'required',
            'title'=>'string|nullable',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=370,height=370',

         ]);
         $product = new Product;
         $product->company_id = $request->company_id;
         $product->title = $request->title;
          //image
          if($request->file('image')){

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/product",$filename); //move to file
            $product->image = 'product'.'/'.$filename;
         }


          $product->save();
         return redirect()->route('dashboard.product.list')->with('status', "add product created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $products = Product::all();
        $departments = Department::all();
        //$companies = Company::where('department_id',$id)->get();
        return view('main.modeelItem', compact('departments','products','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companies = Company::all();
        $product = Product::find($id);

        return view('pages.product.edit', compact('product','companies'));
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
            'company_id'=>'required',
            'title'=>'string|required',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=370,height=370',
         ]);

         $product = Product::find($id);
         $product->company_id = $request->company_id;
         $product->title = $request->title;
         //image
         if($request->file('image')){
            $destination = 'images/'. $product->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/product",$filename); //move to file
            $product->image = 'product'.'/'.$filename;
         }

         $product->update();
         return redirect()->route('dashboard.product.list')->with('status', "Product updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        return redirect()->route('dashboard.product.list')->with('status','Product Deleted Successfully');
    }
}
