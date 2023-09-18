<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modeel;
use App\Models\Visit;

class VisitController extends Controller
{

    public function list() {
        $visits = Visit::all();
        return view('pages.visit.list', compact('visits'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $myfile->filePDF;
        //return redirect('pdf/'.$myfile->filePDF);

        $this->validate($request,[
            'modeel_id'=>'required',
            'organization'=>'required|string',
            'fullName'=>'required|string',
            'email'=>'required|email',
            'phone'=>'string|nullable',

         ]);
         $visit = new Visit;
         $visit->modeel_id = $request->modeel_id;
         $visit->organization = $request->organization;
         $visit->fullName = $request->fullName;
         $visit->email = $request->email;
         $visit->phone = $request->phone;


         //file pdf
        //  if($request->file('filePDF')){
        //     $pdf = $request->file('filePDF');
        //     $filename = time().'_'.$pdf->getClientOriginalName();
        //     $filename = str_replace(' ','-',$filename);
        //     $pdf->move("pdf/modeel",$filename); //move to file
        //     $visit->filePDF = 'modeel'.'/'.$filename;
        //  }
        $myfile = Modeel::select('filePDF')->where('id',$request->modeel_id)->first();

          $visit->save();
          return redirect('pdf/'.$myfile->filePDF)->with('status', "sent info successfully");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visit = Visit::find($id);

        // $destination2 = 'pdf/'. $modeel->filePDF;
        // if(File::exists($destination2)){
        //     File::delete($destination2);
        // }
        $visit->delete();
        return redirect()->route('dashboard.visit.list')->with('status','Visitor Deleted Successfully');
    }
}
