<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Customer;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

   
    public function getRegView()
    {
        return view('customer_submission');
    }
    
    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:customers',
//            'phone ' => 'required',
            'role' => 'required',
            'textarea1' => 'required',
            'textarea2' => 'required',
            'branch' => 'required',
            'desc_file' => 'required'
        ]);

        $data = $request->except('desc_file','_token','role','branch');
        $data['role_id'] = $request->role;
        $data['branch_id'] = $request->branch;

        $file = $request->desc_file;

        $file_name = rand(10,99) . time() . '.' .$file->getClientOriginalExtension();
        
        $destinationPath = 'uploads/customers';
        $file->move($destinationPath,$file->getClientOriginalName());

        $data['desc_file'] = $file_name;
        $data['deleted_at'] = Carbon::now();
        

//        dd($data);
        Customer::create($data);
        
        return view('layouts.message');
        
    }
}
