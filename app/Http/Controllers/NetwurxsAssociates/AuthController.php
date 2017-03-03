<?php

namespace App\Http\Controllers\NetwurxsAssociates;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Associate;

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
        return view('netwurxs_associates');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:netwurxs_associates',
            'expertise_area' => 'required',
            'area_input'=>'required_if:expertise_area,other',
            'information' => 'required',
            'linked_in' =>'required',
            'resume' => 'required|max:10240000000',
        ]);

        $data = $request->except('desc_file','_token','expertise_area');
        if($request->expertise_area == 'other' ) {
            $data ['expertise_area'] = $request->area_input;
            }
        else{
            $data ['expertise_area'] = $request->expertise_area;
        }


        $file = $request->resume;

        $file_name = rand(10,99) . time() . '.' .$file->getClientOriginalExtension();

        $destinationPath = 'uploads/associates';
        $file->move($destinationPath,$file->getClientOriginalName());

        $data['resume'] = $file_name;
        $data['deleted_at'] = Carbon::now();

        Associate::create($data);

        return view('layouts.message');

    }
}
