<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Modeel;
class ModeelController extends Controller
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
        $modeels = Modeel::all();
        return view('pages.modeel.list', compact('modeels'));
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
        return view('pages.modeel.create', compact('products'));
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
            'title'=>'string|nullable',
            'description'=>'string|nullable',
            'text'=>'string|nullable',
            'linkVideo'=>'string|nullable',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:6096|dimensions:width=370,height=370',
            'filePDF'=>'nullable',

         ]);
         $modeel = new Modeel;
         $modeel->product_id = $request->product_id;
         $modeel->title = $request->title;
         $modeel->description = $request->description;
         $modeel->text = $request->text;
         $modeel->linkVideo = $request->linkVideo;
         //image
         if($request->file('image')){

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $image->move("images/modeel",$filename); //move to file
            $modeel->image = 'modeel'.'/'.$filename;
         }

         //file pdf
         if($request->file('filePDF')){
            $pdf = $request->file('filePDF');
            $filename = time().'_'.$pdf->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);
            $pdf->move("pdf/modeel",$filename); //move to file
            $modeel->filePDF = 'modeel'.'/'.$filename;
         }

          $modeel->save();
         return redirect()->route('dashboard.modeel.list')->with('status', "add Model created successfully");
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
        $modeel = Modeel::find($id);

        return view('pages.modeel.edit', compact('modeel','products'));
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
            'title'=>'string|nullable',
            'description'=>'string|nullable',
            'text'=>'string|nullable',
            'linkVideo'=>'string|nullable',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096|dimensions:width=1920,height=650',
            'filePDF'=>'nullable',
         ]);

         $modeel = Modeel::find($id);
         $modeel->product_id = $request->product_id;
         $modeel->title = $request->title;
         $modeel->description = $request->description;
         $modeel->text = $request->text;
         $modeel->linkVideo = $request->linkVideo;

         if($request->file('image')){
            $destination = 'images/'. $modeel->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $imagepath = $image->move("images/modeel",$filename); //move to file
            $modeel->image = 'modeel'.'/'.$filename;
         }

         if($request->file('filePDF')){
            $destination = 'pdf/'. $modeel->filePDF;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $pdf = $request->file('filePDF');
            $filename = time().'_'.$pdf->getClientOriginalName();
            $filename = str_replace(' ','-',$filename);

            $pdfpath = $pdf->move("pdf/modeel",$filename); //move to file
            $modeel->filePDF = 'modeel'.'/'.$filename;
         }

         $modeel->update();
         return redirect()->route('dashboard.modeel.list')->with('status', "Model updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modeel = Modeel::find($id);

        $destination = 'images/'. $modeel->image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $destination2 = 'pdf/'. $modeel->filePDF;
        if(File::exists($destination2)){
            File::delete($destination2);
        }
        $modeel->delete();
        return redirect()->route('dashboard.modeel.list')->with('status','Model Deleted Successfully');
    }
}
