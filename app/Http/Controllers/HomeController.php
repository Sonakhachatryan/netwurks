<?php

namespace App\Http\Controllers;

use App\Models\ContactDetails;
use Illuminate\Http\Request;
use App\Http\Middleware\UserMiddleware;

use Mail;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = ContactDetails::first();

        return view('index',compact('details'));
    }
    
    public function contact(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $to = ContactDetails::first()->email;
        $from = $request->email;
        $name = $request->name;
        $phone = $request->phone;
        $message1 = $request->message;

        Mail::send('emails.contact', ['phone' => $phone, 'message1' => $message1], function ($message) use($to,$from,$name) {
            $message->from('petersonben45@gmail.com', $name);
            $message->to($to);
        });

        return response()->json(['success' => 1]);
    }
}
