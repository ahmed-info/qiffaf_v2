<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        return view('main.contactUs');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'fullName' => 'required|string',
            'organization' => 'required|string',
            'mobile' => 'required|digits:11|numeric',
            'email' => 'required|email',
            'message' => 'required|string'
        ]);
        // return $request->all();
        Contact::create($request->all());
        return redirect()->back()
                         ->with(['success' => 'Thank you for contact us. we will contact you shortly.']);
    }
}
