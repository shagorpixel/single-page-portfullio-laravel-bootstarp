<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class contactController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required|max:14',
            'messege'=>'required'
        ]);
        $contact_form_data = $request->all();
        Mail::to('shagormta0@gmail.com')->send(new ContactFormMail($contact_form_data));
        return redirect()->route('home.page','/#contact')->with('success','Your Messege Has Been Submited Successfully');
    }
}
