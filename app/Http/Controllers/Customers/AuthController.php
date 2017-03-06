<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Customer;
use App\Models\Industry;
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
        $industries = Industry::all();
        
        return view('customer_submission',compact('industries'));
    }
    
    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'expertise_area' => 'required',
            'area_input'=>'required_if:expertise_area,other',
            'objective' => 'required',
            'outline_of_topic' => 'required',
            'industry_id' => 'required|exists:industries,id',
            'desc_file' => 'required'
        ],[
            'industry_id.required' => 'Industry field requird.',
            'industry_id.exists' => 'The selected industry is invalid.'
        ]);

        $data = $request->except('desc_file','_token','expertise_area');
        if($request->expertise_area == 'other' ) {
            $data ['expertise_area'] = $request->area_input;
        }
        else{
            $data ['expertise_area'] = $request->expertise_area;
        }

        
        $file = $request->desc_file;

        $file_name = rand(10,99) . time() . '.' .$file->getClientOriginalExtension();
        
        $destinationPath = 'uploads/customers';
        $file->move($destinationPath,$file->getClientOriginalName());

        $data['desc_file'] = $file_name;
        $data['deleted_at'] = Carbon::now();
        


        Customer::create($data);
        
        return view('layouts.message');
        
    }
}
