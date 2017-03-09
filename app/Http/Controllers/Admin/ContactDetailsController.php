<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ContactDetailsController extends Controller
{
   public function index()
   {
       $details = ContactDetails::first();
       
       return view('admin.pages.contact_details',compact('details'));
   }
    
    public function update($field,Request $request)
    {
        $details = ContactDetails::first();
        if($details){
            $details->update(["$field" => $request->value]);
        }
        else{
            ContactDetails::create(["$field" => $request->value]);
        }
        
        return response()->json(['success'=>1]);
    }
    
}
